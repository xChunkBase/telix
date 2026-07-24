<?php
declare(strict_types=1);

namespace Telix\Exception;

final class DatabaseException extends \RuntimeException implements TelixException
{
    public static function wrap(\PDOException $exception, string $sql): self
    {
        return new self("Database query failed: {$exception->getMessage()} [{$sql}]", 0, $exception);
    }
}
