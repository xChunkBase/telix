<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Type\Enum\UpdateType;
use Telix\Serialization\Hydrator;

final readonly class Update
{
    public function __construct(
        public int                          $updateId,
        public ?Message                     $message                 = null,
        public ?Message                     $editedMessage           = null,
        public ?Message                     $channelPost             = null,
        public ?Message                     $editedChannelPost       = null,
        public ?BusinessConnection          $businessConnection      = null,
        public ?Message                     $businessMessage         = null,
        public ?Message                     $editedBusinessMessage   = null,
        public ?BusinessMessagesDeleted     $deletedBusinessMessages = null,
        public ?MessageReactionUpdated      $messageReaction         = null,
        public ?MessageReactionCountUpdated $messageReactionCount    = null,
        public ?InlineQuery                 $inlineQuery             = null,
        public ?ChosenInlineResult          $chosenInlineResult      = null,
        public ?CallbackQuery               $callbackQuery           = null,
        public ?ShippingQuery               $shippingQuery           = null,
        public ?PreCheckoutQuery            $preCheckoutQuery        = null,
        public ?PaidMediaPurchased          $purchasedPaidMedia      = null,
        public ?Poll                        $poll                    = null,
        public ?PollAnswer                  $pollAnswer              = null,
        public ?ChatMemberUpdated           $myChatMember            = null,
        public ?ChatMemberUpdated           $chatMember              = null,
        public ?ChatJoinRequest             $chatJoinRequest         = null,
        public ?ChatBoostUpdated            $chatBoost               = null,
        public ?ChatBoostRemoved            $removedChatBoost        = null,
        public array                        $raw                     = []
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return Hydrator::hydrate(self::class, $data);
    }

    public function type(): UpdateType
    {
        return match (true) {
            $this->message !== null                 => UpdateType::Message,
            $this->editedMessage !== null           => UpdateType::EditedMessage,
            $this->channelPost !== null             => UpdateType::ChannelPost,
            $this->editedChannelPost !== null       => UpdateType::EditedChannelPost,
            $this->businessConnection !== null      => UpdateType::BusinessConnection,
            $this->businessMessage !== null         => UpdateType::BusinessMessage,
            $this->editedBusinessMessage !== null   => UpdateType::EditedBusinessMessage,
            $this->deletedBusinessMessages !== null => UpdateType::DeletedBusinessMessages,
            $this->messageReaction !== null         => UpdateType::MessageReaction,
            $this->messageReactionCount !== null    => UpdateType::MessageReactionCount,
            $this->inlineQuery !== null             => UpdateType::InlineQuery,
            $this->chosenInlineResult !== null      => UpdateType::ChosenInlineResult,
            $this->callbackQuery !== null           => UpdateType::CallbackQuery,
            $this->shippingQuery !== null           => UpdateType::ShippingQuery,
            $this->preCheckoutQuery !== null        => UpdateType::PreCheckoutQuery,
            $this->purchasedPaidMedia !== null      => UpdateType::PurchasedPaidMedia,
            $this->poll !== null                    => UpdateType::Poll,
            $this->pollAnswer !== null              => UpdateType::PollAnswer,
            $this->myChatMember !== null            => UpdateType::MyChatMember,
            $this->chatMember !== null              => UpdateType::ChatMember,
            $this->chatJoinRequest !== null         => UpdateType::ChatJoinRequest,
            $this->chatBoost !== null               => UpdateType::ChatBoost,
            $this->removedChatBoost !== null        => UpdateType::RemovedChatBoost,
            default                                 => UpdateType::Unknown,
        };
    }

    public function anyMessage(): ?Message
    {
        return $this->message
            ?? $this->editedMessage
            ?? $this->channelPost
            ?? $this->editedChannelPost
            ?? $this->businessMessage
            ?? $this->editedBusinessMessage
            ?? $this->callbackQuery?->message;
    }

    public function from(): ?User
    {
        return $this->message?->from
            ?? $this->editedMessage?->from
            ?? $this->channelPost?->from
            ?? $this->editedChannelPost?->from
            ?? $this->businessMessage?->from
            ?? $this->editedBusinessMessage?->from
            ?? $this->callbackQuery?->from
            ?? $this->inlineQuery?->from
            ?? $this->chosenInlineResult?->from
            ?? $this->shippingQuery?->from
            ?? $this->preCheckoutQuery?->from
            ?? $this->purchasedPaidMedia?->from
            ?? $this->pollAnswer?->user
            ?? $this->myChatMember?->from
            ?? $this->chatMember?->from
            ?? $this->chatJoinRequest?->from
            ?? $this->messageReaction?->user;
    }

    public function chat(): ?Chat
    {
        return $this->anyMessage()?->chat
            ?? $this->messageReaction?->chat
            ?? $this->messageReactionCount?->chat
            ?? $this->deletedBusinessMessages?->chat
            ?? $this->myChatMember?->chat
            ?? $this->chatMember?->chat
            ?? $this->chatJoinRequest?->chat
            ?? $this->chatBoost?->chat
            ?? $this->removedChatBoost?->chat;
    }
}
