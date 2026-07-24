<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class ChatFullInfo
{
    public function __construct(
        public int                   $id,
        public string                $type,
        public int                   $accentColorId,
        public int                   $maxReactionCount,
        public AcceptedGiftTypes     $acceptedGiftTypes,
        public ?string               $title                              = null,
        public ?string               $username                           = null,
        public ?string               $firstName                          = null,
        public ?string               $lastName                           = null,
        public ?bool                 $isForum                            = null,
        public ?bool                 $isDirectMessages                   = null,
        public ?ChatPhoto            $photo                              = null,
        public ?array                $activeUsernames                    = null,
        public ?Birthdate            $birthdate                          = null,
        public ?BusinessIntro        $businessIntro                      = null,
        public ?BusinessLocation     $businessLocation                   = null,
        public ?BusinessOpeningHours $businessOpeningHours               = null,
        public ?Chat                 $personalChat                       = null,
        public ?Chat                 $parentChat                         = null,
        #[ArrayOf(ReactionType::class)]
        public ?array                $availableReactions                 = null,
        public ?string               $backgroundCustomEmojiId            = null,
        public ?int                  $profileAccentColorId               = null,
        public ?string               $profileBackgroundCustomEmojiId     = null,
        public ?string               $emojiStatusCustomEmojiId           = null,
        public ?int                  $emojiStatusExpirationDate          = null,
        public ?string               $bio                                = null,
        public ?bool                 $hasPrivateForwards                 = null,
        public ?bool                 $hasRestrictedVoiceAndVideoMessages = null,
        public ?bool                 $joinToSendMessages                 = null,
        public ?bool                 $joinByRequest                      = null,
        public ?string               $description                        = null,
        public ?string               $inviteLink                         = null,
        public ?Message              $pinnedMessage                      = null,
        public ?ChatPermissions      $permissions                        = null,
        public ?bool                 $canSendPaidMedia                   = null,
        public ?int                  $slowModeDelay                      = null,
        public ?int                  $unrestrictBoostCount               = null,
        public ?int                  $messageAutoDeleteTime              = null,
        public ?bool                 $hasAggressiveAntiSpamEnabled       = null,
        public ?bool                 $hasHiddenMembers                   = null,
        public ?bool                 $hasProtectedContent                = null,
        public ?bool                 $hasVisibleHistory                  = null,
        public ?string               $stickerSetName                     = null,
        public ?bool                 $canSetStickerSet                   = null,
        public ?string               $customEmojiStickerSetName          = null,
        public ?int                  $linkedChatId                       = null,
        public ?ChatLocation         $location                           = null,
        public ?UserRating           $rating                             = null,
        public ?Audio                $firstProfileAudio                  = null,
        public ?UniqueGiftColors     $uniqueGiftColors                   = null,
        public ?int                  $paidMessageStarCount               = null,
        public ?User                 $guardBot                           = null,
        public ?Community            $community                          = null,
        public array                 $raw                                = []
    )
    {
    }
}
