<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetUserEmojiStatus
{
    public function setUserEmojiStatus(
        int     $userId,
        ?string $emojiStatusCustomEmojiId  = null,
        ?int    $emojiStatusExpirationDate = null
    ): bool
    {
        return $this->call(new RawMethod('setUserEmojiStatus', [
            'user_id'                      => $userId,
            'emoji_status_custom_emoji_id' => $emojiStatusCustomEmojiId,
            'emoji_status_expiration_date' => $emojiStatusExpirationDate,
        ], ResponseMap::of('setUserEmojiStatus')));
    }
}
