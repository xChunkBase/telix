<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SendChecklist
{
    public function sendChecklist(
        string     $businessConnectionId,
        int|string $chatId,
        mixed      $checklist,
        ?bool      $disableNotification  = null,
        ?bool      $protectContent       = null,
        ?string    $messageEffectId      = null,
        mixed      $replyParameters      = null,
        mixed      $replyMarkup          = null
    ): \Telix\Type\Message
    {
        return $this->call(new RawMethod('sendChecklist', [
            'business_connection_id' => $businessConnectionId,
            'chat_id'                => $chatId,
            'checklist'              => $checklist,
            'disable_notification'   => $disableNotification,
            'protect_content'        => $protectContent,
            'message_effect_id'      => $messageEffectId,
            'reply_parameters'       => $replyParameters,
            'reply_markup'           => $replyMarkup,
        ], ResponseMap::of('sendChecklist')));
    }
}
