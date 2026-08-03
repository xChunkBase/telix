<?php
declare(strict_types=1);

namespace Telix\Bot;

use Telix\Type\Chat;
use Telix\Type\User;
use Telix\Type\Update;
use Telix\Nudge\Nudges;
use Telix\Type\Message;
use Telix\Client\BotApi;
use Telix\Memory\Memory;
use Telix\I18n\Translator;
use Telix\Keyboard\Keyboard;
use Telix\Type\CallbackQuery;
use Telix\Type\Enum\ParseMode;
use Telix\Type\Enum\ChatAction;
use Telix\Conversation\StateStore;

final class Context
{
    private array $params = [];

    public function __construct(
        public readonly Update       $update,
        private readonly BotApi      $api,
        private readonly ?Translator $translator       = null,
        private ?string              $locale           = null,
        private readonly ?ParseMode  $defaultParseMode = null,
        private readonly ?StateStore $state            = null,
        private readonly ?Memory     $memory           = null,
        private readonly ?Nudges     $nudges           = null
    )
    {
    }

    public function api(): BotApi
    {
        return $this->api;
    }

    public function message(): ?Message
    {
        return $this->update->anyMessage();
    }

    public function callbackQuery(): ?CallbackQuery
    {
        return $this->update->callbackQuery;
    }

    public function callbackData(): ?string
    {
        return $this->update->callbackQuery?->data;
    }

    public function chat(): ?Chat
    {
        return $this->update->chat();
    }

    public function chatId(): int|null
    {
        return $this->update->chat()?->id;
    }

    public function from(): ?User
    {
        return $this->update->from();
    }

    public function text(): ?string
    {
        return $this->update->message?->text;
    }

    public function param(string $name, mixed $default = null): mixed
    {
        return $this->params[$name] ?? $default;
    }

    public function setParam(string $name, mixed $value): void
    {
        $this->params[$name] = $value;
    }

    public function params(): array
    {
        return $this->params;
    }

    public function args(): ?string
    {
        $args = $this->params['args'] ?? null;

        return \is_string($args) && $args !== '' ? $args : null;
    }

    public function reply(string $text, ?ParseMode $parseMode = null, mixed $replyMarkup = null, bool $quote = false): Message
    {
        return $this->api->sendMessage(
            $this->requireChatId(),
            $text,
            $parseMode ?? $this->defaultParseMode,
            $this->markup($replyMarkup),
            $quote ? $this->message()?->messageId : null
        );
    }

    public function replyHtml(string $text, mixed $replyMarkup = null): Message
    {
        return $this->reply($text, ParseMode::Html, $replyMarkup);
    }

    public function edit(string $text, ?ParseMode $parseMode = null, mixed $replyMarkup = null): Message|bool
    {
        $message = $this->requireMessage();

        return $this->api->editMessageText($message->chat->id, $message->messageId, $text, $parseMode ?? $this->defaultParseMode, $this->markup($replyMarkup));
    }

    public function editReplyMarkup(mixed $replyMarkup): Message|bool
    {
        $message = $this->requireMessage();

        return $this->api->editMessageReplyMarkup($message->chat->id, $message->messageId, $this->markup($replyMarkup));
    }

    public function answer(?string $text = null, bool $showAlert = false): bool
    {
        $callbackQuery = $this->update->callbackQuery;

        if ($callbackQuery === null) {
            throw new \LogicException('answer() requires a callback query update.');
        }

        return $this->api->answerCallbackQuery($callbackQuery->id, $text, $showAlert);
    }

    public function toast(?string $text = null, bool $showAlert = false): bool
    {
        if ($this->update->callbackQuery === null) {
            return false;
        }

        return $this->answer($text === null ? null : strip_tags($text), $showAlert);
    }

    public function delete(?int $messageId = null): bool
    {
        return $this->api->deleteMessage(
            $this->requireChatId(),
            $messageId ?? $this->requireMessage()->messageId
        );
    }

    public function typing(ChatAction $action = ChatAction::Typing): bool
    {
        return $this->api->sendChatAction($this->requireChatId(), $action);
    }

    public function t(string $key, array $params = []): string
    {
        return $this->translator?->t($key, $params, $this->locale) ?? $key;
    }

    public function locale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(?string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    public function enter(string $step, array $data = [], ?int $ttl = null): void
    {
        $this->requireState()->enter($this->requireUserId(), $step, $data, $ttl);
    }

    public function advance(string $step, array $data = [], ?int $ttl = null): void
    {
        $this->requireState()->advance($this->requireUserId(), $step, $data, $ttl);
    }

    public function finish(): void
    {
        $this->requireState()->leave($this->requireUserId());
    }

    public function stateData(): array
    {
        return $this->requireState()->data($this->requireUserId());
    }

    public function step(): ?string
    {
        $userId = $this->from()?->id;

        return $userId !== null && $this->state !== null ? $this->state->step($userId) : null;
    }

    public function inConversation(): bool
    {
        $userId = $this->from()?->id;

        return $userId !== null && $this->state !== null && $this->state->inConversation($userId);
    }

    public function nudge(string $name, int $in, array $data = [], ?string $ifStillOnStep = null): void
    {
        $this->requireNudges()->schedule(
            $this->requireChatId(),
            $name,
            $in,
            $data,
            $ifStillOnStep,
            $this->from()?->id
        );
    }

    public function cancelNudge(string $name): void
    {
        $this->requireNudges()->cancel($this->requireChatId(), $name);
    }

    public function remember(string $key, mixed $value, int $ttl = 300): void
    {
        $this->requireMemory()->set($this->scopedKey($key), $value, $ttl);
    }

    public function recall(string $key, mixed $default = null): mixed
    {
        return $this->requireMemory()->get($this->scopedKey($key), $default);
    }

    public function recallOnce(string $key, mixed $default = null): mixed
    {
        return $this->requireMemory()->pull($this->scopedKey($key), $default);
    }

    public function forget(string $key): void
    {
        $this->requireMemory()->forget($this->scopedKey($key));
    }

    public function confirm(string $action, int $within = 15): bool
    {
        $memory = $this->requireMemory();
        $key    = $this->scopedKey('confirm.' . $action);

        if ($memory->has($key)) {
            $memory->forget($key);

            return true;
        }

        $memory->set($key, true, $within);

        return false;
    }

    public function throttle(string $action, int $seconds = 3): bool
    {
        $memory = $this->requireMemory();
        $key    = $this->scopedKey('throttle.' . $action);

        if ($memory->has($key)) {
            return false;
        }

        $memory->set($key, true, $seconds);

        return true;
    }

    public function cooldown(string $action): int
    {
        return $this->requireMemory()->remaining($this->scopedKey('throttle.' . $action)) ?? 0;
    }

    public function count(string $key, int $window = 60): int
    {
        return $this->requireMemory()->increment($this->scopedKey('count.' . $key), 1, $window);
    }

    public function once(string $flag, int $window = Memory::MAX_TTL): bool
    {
        $memory = $this->requireMemory();
        $key    = $this->scopedKey('once.' . $flag);

        if ($memory->has($key)) {
            return false;
        }

        $memory->set($key, true, $window);

        return true;
    }

    private function requireNudges(): Nudges
    {
        return $this->nudges ?? throw new \LogicException('No nudge scheduler configured — construct the Bot via Telix::bot() or use $bot->nudges().');
    }

    private function requireMemory(): Memory
    {
        return $this->memory ?? throw new \LogicException('No memory configured — construct the Bot via Telix::bot() or pass a cache.');
    }

    private function scopedKey(string $key): string
    {
        return 'u' . $this->requireUserId() . '.' . $key;
    }

    private function markup(mixed $replyMarkup): mixed
    {
        return Keyboard::convertible($replyMarkup) ? Keyboard::from($replyMarkup) : $replyMarkup;
    }

    private function requireState(): StateStore
    {
        return $this->state ?? throw new \LogicException('No conversation state configured — construct the Bot via Telix::bot() or pass a StateStore.');
    }

    private function requireUserId(): int
    {
        return $this->from()?->id ?? throw new \LogicException(sprintf('This %s update has no author to key conversation state on.', $this->update->type()->value));
    }

    private function requireChatId(): int
    {
        return $this->chatId() ?? throw new \LogicException(sprintf('This %s update carries no chat to act on.', $this->update->type()->value));
    }

    private function requireMessage(): Message
    {
        return $this->message() ?? throw new \LogicException(sprintf('This %s update carries no message to act on.', $this->update->type()->value));
    }
}
