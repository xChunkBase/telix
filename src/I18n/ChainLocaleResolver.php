<?php
declare(strict_types=1);

namespace Telix\I18n;

use Telix\Type\Update;

final class ChainLocaleResolver implements LocaleResolverInterface
{
    public function __construct(
        private readonly array  $resolvers,
        private readonly string $default   = 'en'
    )
    {
    }

    public function resolve(Update $update): string
    {
        foreach ($this->resolvers as $resolver) {
            $locale = $resolver->resolve($update);

            if ($locale !== null) {
                return $locale;
            }
        }

        return $this->default;
    }
}
