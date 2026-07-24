<?php
declare(strict_types=1);

namespace Telix;

use Telix\Bot\Bot;
use Psr\Log\NullLogger;
use Telix\Client\BotApi;
use Telix\I18n\Translator;
use Psr\Log\LoggerInterface;
use Telix\Type\Enum\ParseMode;
use Psr\SimpleCache\CacheInterface;
use Psr\Container\ContainerInterface;
use Telix\Client\Transport\RetryPolicy;
use Telix\I18n\LocaleResolverInterface;
use Telix\Client\Transport\Psr18Transport;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Client\ClientInterface as HttpClientInterface;

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
        ?HttpClientInterface     $http           = null
    ): Bot
    {
        $logger ??= new NullLogger();

        return new Bot(
            self::api($token, $http, logger: $logger),
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
        string                   $token,
        ?HttpClientInterface     $http           = null,
        ?RequestFactoryInterface $requestFactory = null,
        ?StreamFactoryInterface  $streamFactory  = null,
        ?LoggerInterface         $logger         = null,
        ?RetryPolicy             $retryPolicy    = null,
        string                   $baseUri        = 'https://api.telegram.org'
    ): BotApi
    {
        if ($http === null || $requestFactory === null || $streamFactory === null) {
            if (!class_exists(\GuzzleHttp\Client::class) || !class_exists(\GuzzleHttp\Psr7\HttpFactory::class)) {
                throw new \LogicException('No PSR-18 HTTP client available. Run "composer require guzzlehttp/guzzle" or pass your own client and PSR-17 factories to Telix::api().');
            }

            $http ??= new \GuzzleHttp\Client(['http_errors' => false, 'timeout' => 120]);
            $factory = new \GuzzleHttp\Psr7\HttpFactory();

            $streamFactory ??= $factory;
            $requestFactory ??= $factory;
        }

        return new BotApi(new Psr18Transport(
            $http,
            $requestFactory,
            $streamFactory,
            $token,
            $baseUri,
            $retryPolicy ?? new RetryPolicy(),
            $logger ?? new NullLogger()
        ));
    }
}
