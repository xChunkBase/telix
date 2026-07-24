<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InputRichBlockVoiceNote
{
    public function __construct(
        public string              $type,
        public InputMediaVoiceNote $voiceNote,
        public ?RichBlockCaption   $caption   = null,
        public array               $raw       = []
    )
    {
    }
}
