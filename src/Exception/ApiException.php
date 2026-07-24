<?php
declare(strict_types=1);

namespace Telix\Exception;

class ApiException extends \RuntimeException implements TelixException
{
    public function __construct(
        string               $description,
        public readonly int  $errorCode,
        public readonly ?int $retryAfter      = null,
        public readonly ?int $migrateToChatId = null
    )
    {
        parent::__construct($description, $errorCode);
    }

    public static function create(int $errorCode, string $description, array $parameters = []): self
    {
        $retryAfter      = isset($parameters['retry_after']) ? (int) $parameters['retry_after'] : null;
        $migrateToChatId = isset($parameters['migrate_to_chat_id']) ? (int) $parameters['migrate_to_chat_id'] : null;

        $class = match ($errorCode) {
            400     => BadRequestException::class,
            401     => UnauthorizedException::class,
            403     => ForbiddenException::class,
            404     => NotFoundException::class,
            409     => ConflictException::class,
            429     => TooManyRequestsException::class,
            default => self::class,
        };

        return new $class($description, $errorCode, $retryAfter, $migrateToChatId);
    }
}
