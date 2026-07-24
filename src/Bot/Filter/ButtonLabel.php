<?php
declare(strict_types=1);

namespace Telix\Bot\Filter;

use Telix\Bot\Context;
use Telix\I18n\Translator;

final class ButtonLabel extends Filter
{
    public function __construct(
        private readonly Translator $translator,
        private readonly string     $labelKey
    )
    {
    }

    public function matches(Context $ctx): bool
    {
        $text = $ctx->update->message?->text;

        if ($text === null) {
            return false;
        }

        foreach ($this->translator->locales() as $locale) {
            if ($text === $this->translator->t($this->labelKey, [], $locale)) {
                return true;
            }
        }

        return false;
    }
}
