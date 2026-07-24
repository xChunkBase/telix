<?php
declare(strict_types=1);

namespace Telix\Update\Webhook;

final class ResponseCloser
{
    public static function close(int $status = 200): void
    {
        if (\PHP_SAPI === 'cli') {
            return;
        }

        ignore_user_abort(true);

        if (!headers_sent()) {
            http_response_code($status);
        }

        if (function_exists('fastcgi_finish_request')) {
            fastcgi_finish_request();

            return;
        }

        if (!headers_sent()) {
            header('Content-Length: 0');
            header('Connection: close');
        }

        while (ob_get_level() > 0) {
            ob_end_flush();
        }

        flush();
    }
}
