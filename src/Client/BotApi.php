<?php
declare(strict_types=1);

namespace Telix\Client;

use Telix\Type\File;
use Telix\Method\RawMethod;
use Telix\Method\MethodInterface;
use Telix\Client\Transport\FileTransportInterface;

final class BotApi
{
    use \Telix\Method\AddStickerToSet;
    use \Telix\Method\AnswerCallbackQuery;
    use \Telix\Method\AnswerChatJoinRequestQuery;
    use \Telix\Method\AnswerGuestQuery;
    use \Telix\Method\AnswerInlineQuery;
    use \Telix\Method\AnswerPreCheckoutQuery;
    use \Telix\Method\AnswerShippingQuery;
    use \Telix\Method\AnswerWebAppQuery;
    use \Telix\Method\ApproveChatJoinRequest;
    use \Telix\Method\ApproveSuggestedPost;
    use \Telix\Method\BanChatMember;
    use \Telix\Method\BanChatSenderChat;
    use \Telix\Method\Close;
    use \Telix\Method\CloseForumTopic;
    use \Telix\Method\CloseGeneralForumTopic;
    use \Telix\Method\ConvertGiftToStars;
    use \Telix\Method\CopyMessage;
    use \Telix\Method\CopyMessages;
    use \Telix\Method\CreateChatInviteLink;
    use \Telix\Method\CreateChatSubscriptionInviteLink;
    use \Telix\Method\CreateForumTopic;
    use \Telix\Method\CreateInvoiceLink;
    use \Telix\Method\CreateNewStickerSet;
    use \Telix\Method\DeclineChatJoinRequest;
    use \Telix\Method\DeclineSuggestedPost;
    use \Telix\Method\DeleteAllMessageReactions;
    use \Telix\Method\DeleteBusinessMessages;
    use \Telix\Method\DeleteChatPhoto;
    use \Telix\Method\DeleteChatStickerSet;
    use \Telix\Method\DeleteEphemeralMessage;
    use \Telix\Method\DeleteForumTopic;
    use \Telix\Method\DeleteMessage;
    use \Telix\Method\DeleteMessageReaction;
    use \Telix\Method\DeleteMessages;
    use \Telix\Method\DeleteMyCommands;
    use \Telix\Method\DeleteStickerFromSet;
    use \Telix\Method\DeleteStickerSet;
    use \Telix\Method\DeleteStory;
    use \Telix\Method\DeleteWebhook;
    use \Telix\Method\EditChatInviteLink;
    use \Telix\Method\EditChatSubscriptionInviteLink;
    use \Telix\Method\EditEphemeralMessageCaption;
    use \Telix\Method\EditEphemeralMessageMedia;
    use \Telix\Method\EditEphemeralMessageReplyMarkup;
    use \Telix\Method\EditEphemeralMessageText;
    use \Telix\Method\EditForumTopic;
    use \Telix\Method\EditGeneralForumTopic;
    use \Telix\Method\EditMessageCaption;
    use \Telix\Method\EditMessageChecklist;
    use \Telix\Method\EditMessageLiveLocation;
    use \Telix\Method\EditMessageMedia;
    use \Telix\Method\EditMessageReplyMarkup;
    use \Telix\Method\EditMessageText;
    use \Telix\Method\EditStory;
    use \Telix\Method\EditUserStarSubscription;
    use \Telix\Method\ExportChatInviteLink;
    use \Telix\Method\ForwardMessage;
    use \Telix\Method\ForwardMessages;
    use \Telix\Method\GetAvailableGifts;
    use \Telix\Method\GetBusinessAccountGifts;
    use \Telix\Method\GetBusinessAccountStarBalance;
    use \Telix\Method\GetBusinessConnection;
    use \Telix\Method\GetChat;
    use \Telix\Method\GetChatAdministrators;
    use \Telix\Method\GetChatGifts;
    use \Telix\Method\GetChatMember;
    use \Telix\Method\GetChatMemberCount;
    use \Telix\Method\GetChatMenuButton;
    use \Telix\Method\GetCustomEmojiStickers;
    use \Telix\Method\GetFile;
    use \Telix\Method\GetForumTopicIconStickers;
    use \Telix\Method\GetGameHighScores;
    use \Telix\Method\GetManagedBotAccessSettings;
    use \Telix\Method\GetManagedBotToken;
    use \Telix\Method\GetMe;
    use \Telix\Method\GetMyCommands;
    use \Telix\Method\GetMyDefaultAdministratorRights;
    use \Telix\Method\GetMyDescription;
    use \Telix\Method\GetMyName;
    use \Telix\Method\GetMyShortDescription;
    use \Telix\Method\GetMyStarBalance;
    use \Telix\Method\GetStarTransactions;
    use \Telix\Method\GetStickerSet;
    use \Telix\Method\GetUpdates;
    use \Telix\Method\GetUserChatBoosts;
    use \Telix\Method\GetUserGifts;
    use \Telix\Method\GetUserPersonalChatMessages;
    use \Telix\Method\GetUserProfileAudios;
    use \Telix\Method\GetUserProfilePhotos;
    use \Telix\Method\GetWebhookInfo;
    use \Telix\Method\GiftPremiumSubscription;
    use \Telix\Method\HideGeneralForumTopic;
    use \Telix\Method\LeaveChat;
    use \Telix\Method\LogOut;
    use \Telix\Method\PinChatMessage;
    use \Telix\Method\PostStory;
    use \Telix\Method\PromoteChatMember;
    use \Telix\Method\ReadBusinessMessage;
    use \Telix\Method\RefundStarPayment;
    use \Telix\Method\RemoveBusinessAccountProfilePhoto;
    use \Telix\Method\RemoveChatVerification;
    use \Telix\Method\RemoveMyProfilePhoto;
    use \Telix\Method\RemoveUserVerification;
    use \Telix\Method\ReopenForumTopic;
    use \Telix\Method\ReopenGeneralForumTopic;
    use \Telix\Method\ReplaceManagedBotToken;
    use \Telix\Method\ReplaceStickerInSet;
    use \Telix\Method\RepostStory;
    use \Telix\Method\RestrictChatMember;
    use \Telix\Method\RevokeChatInviteLink;
    use \Telix\Method\SavePreparedInlineMessage;
    use \Telix\Method\SavePreparedKeyboardButton;
    use \Telix\Method\SendAnimation;
    use \Telix\Method\SendAudio;
    use \Telix\Method\SendChatAction;
    use \Telix\Method\SendChatJoinRequestWebApp;
    use \Telix\Method\SendChecklist;
    use \Telix\Method\SendContact;
    use \Telix\Method\SendDice;
    use \Telix\Method\SendDocument;
    use \Telix\Method\SendGame;
    use \Telix\Method\SendGift;
    use \Telix\Method\SendInvoice;
    use \Telix\Method\SendLivePhoto;
    use \Telix\Method\SendLocation;
    use \Telix\Method\SendMediaGroup;
    use \Telix\Method\SendMessage;
    use \Telix\Method\SendMessageDraft;
    use \Telix\Method\SendPaidMedia;
    use \Telix\Method\SendPhoto;
    use \Telix\Method\SendPoll;
    use \Telix\Method\SendRichMessage;
    use \Telix\Method\SendRichMessageDraft;
    use \Telix\Method\SendSticker;
    use \Telix\Method\SendVenue;
    use \Telix\Method\SendVideo;
    use \Telix\Method\SendVideoNote;
    use \Telix\Method\SendVoice;
    use \Telix\Method\SetBusinessAccountBio;
    use \Telix\Method\SetBusinessAccountGiftSettings;
    use \Telix\Method\SetBusinessAccountName;
    use \Telix\Method\SetBusinessAccountProfilePhoto;
    use \Telix\Method\SetBusinessAccountUsername;
    use \Telix\Method\SetChatAdministratorCustomTitle;
    use \Telix\Method\SetChatDescription;
    use \Telix\Method\SetChatMemberTag;
    use \Telix\Method\SetChatMenuButton;
    use \Telix\Method\SetChatPermissions;
    use \Telix\Method\SetChatPhoto;
    use \Telix\Method\SetChatStickerSet;
    use \Telix\Method\SetChatTitle;
    use \Telix\Method\SetCustomEmojiStickerSetThumbnail;
    use \Telix\Method\SetGameScore;
    use \Telix\Method\SetManagedBotAccessSettings;
    use \Telix\Method\SetMessageReaction;
    use \Telix\Method\SetMyCommands;
    use \Telix\Method\SetMyDefaultAdministratorRights;
    use \Telix\Method\SetMyDescription;
    use \Telix\Method\SetMyName;
    use \Telix\Method\SetMyProfilePhoto;
    use \Telix\Method\SetMyShortDescription;
    use \Telix\Method\SetPassportDataErrors;
    use \Telix\Method\SetStickerEmojiList;
    use \Telix\Method\SetStickerKeywords;
    use \Telix\Method\SetStickerMaskPosition;
    use \Telix\Method\SetStickerPositionInSet;
    use \Telix\Method\SetStickerSetThumbnail;
    use \Telix\Method\SetStickerSetTitle;
    use \Telix\Method\SetUserEmojiStatus;
    use \Telix\Method\SetWebhook;
    use \Telix\Method\StopMessageLiveLocation;
    use \Telix\Method\StopPoll;
    use \Telix\Method\TransferBusinessAccountStars;
    use \Telix\Method\TransferGift;
    use \Telix\Method\UnbanChatMember;
    use \Telix\Method\UnbanChatSenderChat;
    use \Telix\Method\UnhideGeneralForumTopic;
    use \Telix\Method\UnpinAllChatMessages;
    use \Telix\Method\UnpinAllForumTopicMessages;
    use \Telix\Method\UnpinAllGeneralForumTopicMessages;
    use \Telix\Method\UnpinChatMessage;
    use \Telix\Method\UpgradeGift;
    use \Telix\Method\UploadStickerFile;
    use \Telix\Method\VerifyChat;
    use \Telix\Method\VerifyUser;

    private ?\Closure $onProgress = null;

    public function __construct(
        private readonly ClientInterface $client
    )
    {
    }

    public function withProgress(?callable $onProgress): self
    {
        $clone             = clone $this;
        $clone->onProgress = $onProgress === null ? null : $onProgress(...);

        return $clone;
    }

    public function __call(string $method, array $arguments): mixed
    {
        return $this->call(new RawMethod($method, $arguments[0] ?? [], ResponseMap::of($method)));
    }

    public function raw(string $method, array $payload = []): mixed
    {
        return $this->call(new RawMethod($method, $payload, ResponseMap::of($method)));
    }

    public function client(): ClientInterface
    {
        return $this->client;
    }

    public function call(MethodInterface $method): mixed
    {
        return $this->client->call($method, $this->onProgress);
    }

    public function fileUrl(File|string $file): ?string
    {
        $path = $file instanceof File ? $file->filePath : $file;

        if ($path === null || !$this->client instanceof FileTransportInterface) {
            return null;
        }

        return $this->client->fileUrl($path);
    }

    public function downloadFile(File|string $file, string $dest, ?callable $onProgress = null): int
    {
        if (!$this->client instanceof FileTransportInterface) {
            throw new \LogicException('The active transport cannot download files. Use Telix::api(streaming: true).');
        }

        if (\is_string($file)) {
            $file = $this->getFile($file);
        } elseif ($file->filePath === null) {
            $file = $this->getFile($file->fileId);
        }

        $path = $file->filePath ?? throw new \RuntimeException('File has no file_path to download.');

        return $this->client->download($path, $dest, $onProgress);
    }
}
