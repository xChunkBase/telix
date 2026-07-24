<?php
declare(strict_types=1);

namespace Telix\Update\Webhook;

use Telix\Type\Update;
use Telix\Exception\WebhookException;
use Telix\Update\UpdateSourceInterface;
use Psr\Http\Message\ServerRequestInterface;

final class WebhookSource implements UpdateSourceInterface
{
    private function __construct(
        private readonly Update $update
    )
    {
    }

    public static function fromGlobals(?string $secretToken = null): self
    {
        SecretTokenValidator::validate($secretToken, $_SERVER['HTTP_X_TELEGRAM_BOT_API_SECRET_TOKEN'] ?? null);

        return self::fromJson((string) file_get_contents('php://input'));
    }

    public static function fromPsr7(ServerRequestInterface $request, ?string $secretToken = null): self
    {
        $header = $request->getHeaderLine('X-Telegram-Bot-Api-Secret-Token');
        SecretTokenValidator::validate($secretToken, $header === '' ? null : $header);

        return self::fromJson((string) $request->getBody());
    }

    public static function fromJson(string $json): self
    {
        $data = json_decode($json, true);

        if (!\is_array($data) || !isset($data['update_id'])) {
            throw new WebhookException('Request body is not a Telegram update.');
        }

        return new self(Update::fromArray($data));
    }

    public static function fromUpdate(Update $update): self
    {
        return new self($update);
    }

    public function updates(): iterable
    {
        yield $this->update;
    }
}
