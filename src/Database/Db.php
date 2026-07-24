<?php
declare(strict_types=1);

namespace Telix\Database;

use Telix\Exception\DatabaseException;

final class Db
{
    private const OPERATORS = ['=', '!=', '<>', '<', '<=', '>', '>=', 'LIKE', 'NOT LIKE', 'IN', 'NOT IN'];

    private function __construct(
        private readonly \PDO   $pdo,
        private readonly string $driver
    )
    {
    }

    public static function connect(\PDO $pdo): self
    {
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);

        return new self($pdo, (string) $pdo->getAttribute(\PDO::ATTR_DRIVER_NAME));
    }

    public static function sqlite(string $path): self
    {
        $dir = \dirname($path);

        if (!is_dir($dir) && !mkdir($dir, 0770, true) && !is_dir($dir)) {
            throw new DatabaseException("Cannot create database directory: {$dir}");
        }

        $db = self::connect(new \PDO('sqlite:' . $path));
        $db->pdo->exec('PRAGMA journal_mode = WAL');
        $db->pdo->exec('PRAGMA foreign_keys = ON');
        $db->pdo->exec('PRAGMA busy_timeout = 5000');

        return $db;
    }

    public static function mysql(string $database, string $username, #[\SensitiveParameter] string $password, string $host = '127.0.0.1', int $port = 3306): self
    {
        $pdo = new \PDO(
            "mysql:host={$host};port={$port};dbname={$database};charset=utf8mb4",
            $username,
            $password,
            [\PDO::ATTR_EMULATE_PREPARES => false]
        );

        return self::connect($pdo);
    }

    public static function pgsql(string $database, string $username, #[\SensitiveParameter] string $password, string $host = '127.0.0.1', int $port = 5432): self
    {
        return self::connect(new \PDO("pgsql:host={$host};port={$port};dbname={$database}", $username, $password));
    }

    public function pdo(): \PDO
    {
        return $this->pdo;
    }

    public function select(string $table, array $where = [], ?string $orderBy = null, ?int $limit = null, int $offset = 0, array $columns = []): array
    {
        $cols                   = $columns === [] ? '*' : implode(', ', array_map($this->ident(...), $columns));
        [$condition, $bindings] = $this->compileWhere($where);

        $sql = "SELECT {$cols} FROM " . $this->ident($table)
            . ($condition !== '' ? " WHERE {$condition}" : '')
            . ($orderBy !== null ? ' ORDER BY ' . $this->orderBy($orderBy) : '')
            . ($limit !== null ? ' LIMIT ' . max(0, $limit) . ' OFFSET ' . max(0, $offset) : '');

        return $this->statement($sql, $bindings)->fetchAll();
    }

    public function find(string $table, array $where): ?array
    {
        return $this->select($table, $where, limit: 1)[0] ?? null;
    }

    public function count(string $table, array $where = []): int
    {
        [$condition, $bindings] = $this->compileWhere($where);
        $sql                    = 'SELECT COUNT(*) FROM ' . $this->ident($table) . ($condition !== '' ? " WHERE {$condition}" : '');

        return (int) $this->statement($sql, $bindings)->fetchColumn();
    }

    public function exists(string $table, array $where): bool
    {
        return $this->count($table, $where) > 0;
    }

    public function value(string $sql, array $bindings = []): mixed
    {
        $result = $this->statement($sql, $bindings)->fetchColumn();

        return $result === false ? null : $result;
    }

    public function row(string $sql, array $bindings = []): ?array
    {
        return $this->statement($sql, $bindings)->fetch() ?: null;
    }

    public function rows(string $sql, array $bindings = []): array
    {
        return $this->statement($sql, $bindings)->fetchAll();
    }

    public function insert(string $table, array $values): int
    {
        $this->statement($this->compileInsert($table, $values), array_values($values));

        return $this->lastId();
    }

    public function insertMany(string $table, array $rows): void
    {
        if ($rows === []) {
            return;
        }

        $this->transaction(function () use ($table, $rows): void {
            foreach ($rows as $row) {
                $this->insert($table, $row);
            }
        });
    }

    public function upsert(string $table, array $values, string|array $uniqueBy): void
    {
        $unique    = (array) $uniqueBy;
        $updatable = array_diff(array_keys($values), $unique);

        $sql = $this->compileInsert($table, $values);

        if ($this->driver === 'mysql') {
            $assignments = $updatable === []
                ? $this->ident($unique[0]) . ' = ' . $this->ident($unique[0])
                : implode(', ', array_map(fn (string $c): string => $this->ident($c) . ' = VALUES(' . $this->ident($c) . ')', $updatable));
            $sql .= " ON DUPLICATE KEY UPDATE {$assignments}";
        } else {
            $conflict = implode(', ', array_map($this->ident(...), $unique));
            $sql .= " ON CONFLICT ({$conflict}) DO " . ($updatable === []
                ? 'NOTHING'
                : 'UPDATE SET ' . implode(', ', array_map(fn (string $c): string => $this->ident($c) . ' = excluded.' . $this->ident($c), $updatable)));
        }

        $this->statement($sql, array_values($values));
    }

    public function update(string $table, array $values, array $where): int
    {
        if ($values === []) {
            return 0;
        }

        if ($where === []) {
            throw new \InvalidArgumentException('update() requires a non-empty where; use run() if you truly mean the whole table.');
        }

        $assignments            = implode(', ', array_map(fn (string $c): string => $this->ident($c) . ' = ?', array_keys($values)));
        [$condition, $bindings] = $this->compileWhere($where);

        return $this->statement(
            'UPDATE ' . $this->ident($table) . " SET {$assignments} WHERE {$condition}",
            [...array_values($values), ...$bindings]
        )->rowCount();
    }

    public function delete(string $table, array $where): int
    {
        if ($where === []) {
            throw new \InvalidArgumentException('delete() requires a non-empty where; use run() if you truly mean the whole table.');
        }

        [$condition, $bindings] = $this->compileWhere($where);

        return $this->statement('DELETE FROM ' . $this->ident($table) . " WHERE {$condition}", $bindings)->rowCount();
    }

    public function run(string $sql, array $bindings = []): int
    {
        return $this->statement($sql, $bindings)->rowCount();
    }

    public function transaction(callable $callback): mixed
    {
        $this->pdo->beginTransaction();

        try {
            $result = $callback($this);
            $this->pdo->commit();

            return $result;
        } catch (\Throwable $exception) {
            $this->pdo->rollBack();

            throw $exception;
        }
    }

    public function lastId(): int
    {
        return (int) $this->pdo->lastInsertId();
    }

    private function statement(string $sql, array $bindings): \PDOStatement
    {
        $bindings = array_map(static fn (mixed $v): mixed => match (true) {
            \is_bool($v)                     => (int) $v,
            $v instanceof \DateTimeInterface => $v->getTimestamp(),
            default                          => $v,
        }, $bindings);

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute(array_values($bindings));

            return $statement;
        } catch (\PDOException $exception) {
            throw DatabaseException::wrap($exception, $sql);
        }
    }

    private function compileInsert(string $table, array $values): string
    {
        if ($values === []) {
            throw new \InvalidArgumentException('insert() needs at least one column.');
        }

        $columns      = implode(', ', array_map($this->ident(...), array_keys($values)));
        $placeholders = implode(', ', array_fill(0, \count($values), '?'));

        return 'INSERT INTO ' . $this->ident($table) . " ({$columns}) VALUES ({$placeholders})";
    }

    /**
     * @return array{0: string, 1: list<mixed>}
     */
    private function compileWhere(array $where): array
    {
        if ($where === []) {
            return ['', []];
        }

        $parts    = [];
        $bindings = [];

        foreach ($where as $key => $value) {
            $key      = trim((string) $key);
            $column   = $key;
            $operator = '=';

            if (preg_match('/^(\S+)\s+(.+)$/', $key, $matches) === 1) {
                $column   = $matches[1];
                $operator = strtoupper(trim($matches[2]));
            }

            if (!\in_array($operator, self::OPERATORS, true)) {
                throw new \InvalidArgumentException("Unsupported operator in where key: \"{$key}\"");
            }

            $quoted = $this->ident($column);

            if ($value === null && $operator === '=') {
                $parts[] = "{$quoted} IS NULL";
                continue;
            }

            if ($value === null && ($operator === '!=' || $operator === '<>')) {
                $parts[] = "{$quoted} IS NOT NULL";
                continue;
            }

            if ($operator === 'IN' || $operator === 'NOT IN') {
                $values = array_values((array) $value);

                if ($values === []) {
                    $parts[] = $operator === 'IN' ? '1 = 0' : '1 = 1';
                    continue;
                }

                $parts[] = "{$quoted} {$operator} (" . implode(', ', array_fill(0, \count($values), '?')) . ')';
                array_push($bindings, ...$values);
                continue;
            }

            $parts[]    = "{$quoted} {$operator} ?";
            $bindings[] = $value;
        }

        return [implode(' AND ', $parts), $bindings];
    }

    private function ident(string $name): string
    {
        $quote = $this->driver === 'mysql' ? '`' : '"';

        $parts = explode('.', $name);

        foreach ($parts as $part) {
            if (preg_match('/^[A-Za-z_][A-Za-z0-9_]*$/', $part) !== 1) {
                throw new \InvalidArgumentException("Unsafe SQL identifier: \"{$name}\"");
            }
        }

        return implode('.', array_map(static fn (string $p): string => $quote . $p . $quote, $parts));
    }

    private function orderBy(string $orderBy): string
    {
        $compiled = [];

        foreach (explode(',', $orderBy) as $piece) {
            $tokens = preg_split('/\s+/', trim($piece), -1, \PREG_SPLIT_NO_EMPTY);

            if ($tokens === false || $tokens === [] || \count($tokens) > 2) {
                throw new \InvalidArgumentException("Unsafe ORDER BY: \"{$orderBy}\"");
            }

            $direction = '';

            if (isset($tokens[1])) {
                $direction = strtoupper($tokens[1]);

                if ($direction !== 'ASC' && $direction !== 'DESC') {
                    throw new \InvalidArgumentException("Unsafe ORDER BY direction: \"{$orderBy}\"");
                }

                $direction = ' ' . $direction;
            }

            $compiled[] = $this->ident($tokens[0]) . $direction;
        }

        return implode(', ', $compiled);
    }
}
