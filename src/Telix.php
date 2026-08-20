<?php
declare(strict_types=1);

namespace Telix;

use Telix\Bot\Bot;
use Psr\Log\NullLogger;
use Telix\Client\BotApi;
use Telix\I18n\Translator;
use Psr\Log\LoggerInterface;
use Telix\Type\Enum\ParseMode;
use Telix\Client\ClientInterface;
use Psr\SimpleCache\CacheInterface;
use Psr\Container\ContainerInterface;
use Telix\Client\Transport\RetryPolicy;
use Telix\Client\Transport\CurlTransport;
use Telix\I18n\LocaleResolverInterface;

final class Telix
{
    public const BOT_API_VERSION = '10.2';

    public static function botApiVersion(): string
    {
        return self::BOT_API_VERSION;
    }

    public static function bot(
        #[\SensitiveParameter]
        string                   $token,
        ?ParseMode               $parseMode      = null,
        ?Translator              $translator     = null,
        ?LocaleResolverInterface $localeResolver = null,
        ?CacheInterface          $cache          = null,
        ?ContainerInterface      $container      = null,
        ?LoggerInterface         $logger         = null,
        ?ClientInterface         $transport      = null
    ): Bot
    {
        $logger ??= new NullLogger();

        return new Bot(
            self::api($token, $logger, transport: $transport),
            $logger,
            $container,
            $translator,
            $localeResolver,
            $parseMode,
            null,
            $cache
        );
    }

    public static function api(
        #[\SensitiveParameter]
        string           $token,
        ?LoggerInterface $logger      = null,
        ?RetryPolicy     $retryPolicy = null,
        string           $baseUri     = 'https://api.telegram.org',
        ?ClientInterface $transport   = null
    ): BotApi
    {
        return new BotApi($transport ?? new CurlTransport(
            $token,
            $baseUri,
            $retryPolicy ?? new RetryPolicy(),
            $logger ?? new NullLogger()
        ));
    }
}
