<?php
declare(strict_types=1);

namespace Telix\Pagination;

use Telix\Bot\Bot;
use Telix\Bot\Context;
use Telix\Keyboard\Button;
use Telix\Bot\Filter\CallbackData;
use Telix\Keyboard\InlineKeyboard;

final class Paginator
{
    private const CALLBACK_PREFIX = 'telix:pg';
    private const NOOP            = 'telix:noop';

    public function __construct(
        private readonly string                      $id,
        private readonly DataProviderInterface       $provider,
        private readonly \Closure                    $renderButton,
        private readonly int                         $perPage      = 8,
        private readonly int                         $columns      = 1,
        private readonly ?\Closure                   $renderText   = null,
        private readonly ?\Telix\Type\Enum\ParseMode $parseMode    = null
    )
    {
        if (preg_match('/^[\w.-]+$/', $id) !== 1) {
            throw new \InvalidArgumentException('Paginator id may only contain letters, digits, "_", "." and "-".');
        }
    }

    public function register(Bot $bot): self
    {
        $bot->on(
            CallbackData::pattern(self::CALLBACK_PREFIX . ":{$this->id}:{page}"),
            function (Context $ctx, int $page): void {
                $ctx->answer();
                $this->show($ctx, $page, edit: true);
            }
        );

        $bot->on(CallbackData::exact(self::NOOP), static fn (Context $ctx) => $ctx->answer());

        return $this;
    }

    public function show(Context $ctx, int $page = 1, bool $edit = false): void
    {
        $totalPages = max(1, (int) ceil($this->provider->count($ctx) / $this->perPage));
        $page       = max(1, min($page, $totalPages));

        $items = $this->provider->slice(($page - 1) * $this->perPage, $this->perPage, $ctx);

        $keyboard = InlineKeyboard::make()->grid(
            array_map(fn (mixed $item): Button => ($this->renderButton)($item), $items),
            $this->columns
        );

        if ($totalPages > 1) {
            $keyboard->row(
                $page > 1
                    ? Button::callback('«', self::CALLBACK_PREFIX . ":{$this->id}:" . ($page - 1))
                    : Button::callback('·', self::NOOP),
                Button::callback("{$page} / {$totalPages}", self::NOOP),
                $page < $totalPages
                    ? Button::callback('»', self::CALLBACK_PREFIX . ":{$this->id}:" . ($page + 1))
                    : Button::callback('·', self::NOOP)
            );
        }

        $text = $this->renderText !== null
            ? ($this->renderText)($page, $totalPages, $ctx)
            : "📄 {$page}/{$totalPages}";

        if ($edit) {
            $ctx->edit($text, $this->parseMode, $keyboard);
        } else {
            $ctx->reply($text, $this->parseMode, $keyboard);
        }
    }
}
