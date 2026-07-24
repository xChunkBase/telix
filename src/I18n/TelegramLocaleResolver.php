<?php
declare(strict_types=1);

namespace Telix\I18n;

use Telix\Type\Update;

final class TelegramLocaleResolver implements LocaleResolverInterface
{
    public function resolve(Update $update): ?string
    {
        $code = $update->from()?->languageCode;

        if ($code === null || $code === '') {
            return null;
        }

        return strtolower(explode('-', $code)[0]);
    }
}
