<?php
declare(strict_types=1);

namespace Telix\I18n;

use Telix\Type\Update;

interface LocaleResolverInterface
{
    public function resolve(Update $update): ?string;
}
