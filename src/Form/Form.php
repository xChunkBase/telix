<?php
declare(strict_types=1);

namespace Telix\Form;

use Telix\Bot\Bot;
use Telix\Bot\Context;

final class Form
{
    private array $fields   = [];
    private ?\Closure $then = null;
    private ?int $ttl       = null;

    private function __construct(
        private readonly string $name
    )
    {
    }

    public static function create(string $name): self
    {
        if (preg_match('/^[\w.-]+$/', $name) !== 1) {
            throw new \InvalidArgumentException('Form name may only contain letters, digits, "_", "." and "-".');
        }

        return new self($name);
    }

    public function field(string $fieldName, string|\Closure $prompt, ?Expect $expect = null, mixed $keyboard = null): self
    {
        $this->fields[] = [
            'name'     => $fieldName,
            'prompt'   => $prompt,
            'expect'   => $expect ?? Expect::text(),
            'keyboard' => $keyboard,
        ];

        return $this;
    }

    public function then(callable $handler): self
    {
        $this->then = $handler(...);

        return $this;
    }

    public function ttl(int $seconds): self
    {
        $this->ttl = $seconds;

        return $this;
    }

    public function register(Bot $bot): self
    {
        if ($this->fields === [] || $this->then === null) {
            throw new \LogicException("Form \"{$this->name}\" needs at least one field() and a then() handler.");
        }

        $bot->onStep("telix:form:{$this->name}:{field}", function (Context $ctx, string $field): void {
            $this->handleAnswer($ctx, $field);
        });

        return $this;
    }

    public function start(Context $ctx): void
    {
        if ($this->fields === [] || $this->then === null) {
            throw new \LogicException("Form \"{$this->name}\" needs at least one field() and a then() handler.");
        }

        $ctx->enter($this->step(0), [], $this->ttl);
        $this->prompt($ctx, 0);
    }

    public function cancel(Context $ctx): void
    {
        $ctx->finish();
    }

    private function handleAnswer(Context $ctx, string $fieldName): void
    {
        $index = $this->indexOf($fieldName);

        if ($index === null) {
            $ctx->finish();

            return;
        }

        $field           = $this->fields[$index];
        [$valid, $value] = $field['expect']->attempt($ctx);

        if (!$valid) {
            $ctx->reply($ctx->t($field['expect']->errorMessage()), replyMarkup: $field['keyboard']);

            return;
        }

        $answers             = $ctx->stateData();
        $answers[$fieldName] = $value;

        $next = $index + 1;

        if ($next < \count($this->fields)) {
            $ctx->advance($this->step($next), [$fieldName => $value], $this->ttl);
            $this->prompt($ctx, $next);

            return;
        }

        $ctx->finish();

        if ($this->then !== null) {
            ($this->then)($ctx, $answers);
        }
    }

    private function prompt(Context $ctx, int $index): void
    {
        $field  = $this->fields[$index];
        $prompt = $field['prompt'] instanceof \Closure
            ? ($field['prompt'])($ctx)
            : $ctx->t($field['prompt']);

        $ctx->reply($prompt, replyMarkup: $field['keyboard']);
    }

    private function step(int $index): string
    {
        return "telix:form:{$this->name}:{$this->fields[$index]['name']}";
    }

    private function indexOf(string $fieldName): ?int
    {
        foreach ($this->fields as $index => $field) {
            if ($field['name'] === $fieldName) {
                return $index;
            }
        }

        return null;
    }
}
