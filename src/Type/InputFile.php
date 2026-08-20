<?php
declare(strict_types=1);

namespace Telix\Type;

final class InputFile
{
    private function __construct(
        private readonly ?string $path,
        private readonly ?string $contents,
        public readonly string   $filename
    )
    {
    }

    public static function fromPath(string $path, ?string $filename = null): self
    {
        if (!is_file($path) || !is_readable($path)) {
            throw new \InvalidArgumentException("File not found or not readable: {$path}");
        }

        return new self($path, null, $filename ?? basename($path));
    }

    public static function fromString(string $contents, string $filename): self
    {
        return new self(null, $contents, $filename);
    }

    public function path(): ?string
    {
        return $this->path;
    }

    public function contents(): string
    {
        if ($this->contents !== null) {
            return $this->contents;
        }

        $contents = file_get_contents((string) $this->path);

        if ($contents === false) {
            throw new \RuntimeException("Could not read file: {$this->path}");
        }

        return $contents;
    }
}
