<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Type\Enum\ChatAction;

trait SendChatAction
{
    public function sendChatAction(
        int|string $chatId,
        ChatAction $action = ChatAction::Typing
    ): bool
    {
        return $this->call(new RawMethod('sendChatAction', [
            'chat_id' => $chatId,
            'action'  => $action,
        ], 'bool'));
    }
}
