<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait PromoteChatMember
{
    public function promoteChatMember(
        int|string $chatId,
        int        $userId,
        ?bool      $isAnonymous             = null,
        ?bool      $canManageChat           = null,
        ?bool      $canDeleteMessages       = null,
        ?bool      $canManageVideoChats     = null,
        ?bool      $canRestrictMembers      = null,
        ?bool      $canPromoteMembers       = null,
        ?bool      $canChangeInfo           = null,
        ?bool      $canInviteUsers          = null,
        ?bool      $canPostStories          = null,
        ?bool      $canEditStories          = null,
        ?bool      $canDeleteStories        = null,
        ?bool      $canPostMessages         = null,
        ?bool      $canEditMessages         = null,
        ?bool      $canPinMessages          = null,
        ?bool      $canManageTopics         = null,
        ?bool      $canManageDirectMessages = null,
        ?bool      $canManageTags           = null
    ): bool
    {
        return $this->call(new RawMethod('promoteChatMember', [
            'chat_id'                    => $chatId,
            'user_id'                    => $userId,
            'is_anonymous'               => $isAnonymous,
            'can_manage_chat'            => $canManageChat,
            'can_delete_messages'        => $canDeleteMessages,
            'can_manage_video_chats'     => $canManageVideoChats,
            'can_restrict_members'       => $canRestrictMembers,
            'can_promote_members'        => $canPromoteMembers,
            'can_change_info'            => $canChangeInfo,
            'can_invite_users'           => $canInviteUsers,
            'can_post_stories'           => $canPostStories,
            'can_edit_stories'           => $canEditStories,
            'can_delete_stories'         => $canDeleteStories,
            'can_post_messages'          => $canPostMessages,
            'can_edit_messages'          => $canEditMessages,
            'can_pin_messages'           => $canPinMessages,
            'can_manage_topics'          => $canManageTopics,
            'can_manage_direct_messages' => $canManageDirectMessages,
            'can_manage_tags'            => $canManageTags,
        ], ResponseMap::of('promoteChatMember')));
    }
}
