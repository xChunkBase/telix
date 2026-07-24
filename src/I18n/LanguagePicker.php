<?php
declare(strict_types=1);

namespace Telix\I18n;

use Telix\Bot\Bot;
use Telix\Bot\Context;
use Telix\Keyboard\Button;
use Telix\Bot\Filter\CallbackData;
use Telix\Keyboard\InlineKeyboard;

final class LanguagePicker
{
    private const CALLBACK_PREFIX = 'telix:lang';

    public function __construct(
        private readonly array               $locales,
        private readonly CacheLocaleResolver $store,
        private readonly ?Translator         $translator = null
    )
    {
    }

    public function keyboard(int $columns = 2): InlineKeyboard
    {
        $buttons = [];

        foreach ($this->locales as $code => $label) {
            $buttons[] = Button::callback($label, self::CALLBACK_PREFIX . ':' . $code);
        }

        return InlineKeyboard::make()->grid($buttons, $columns);
    }

    public function register(Bot $bot): self
    {
        $bot->on(
            CallbackData::pattern(self::CALLBACK_PREFIX . ':{code}'),
            function (Context $ctx, string $code): void {
                if (!isset($this->locales[$code])) {
                    $ctx->answer('Unknown language.', showAlert: true);

                    return;
                }

                $userId = $ctx->from()?->id;

                if ($userId !== null) {
                    $this->store->set($userId, $code);
                }

                $ctx->answer();
                $ctx->edit($this->confirmation($code));
            }
        );

        return $this;
    }

    private function confirmation(string $code): string
    {
        $label = $this->locales[$code];

        $message = $this->translator?->t('language.changed', ['language' => $label], $code);

        if ($message !== null && $message !== 'language.changed') {
            return $message;
        }

        return "✅ {$label}";
    }
}
