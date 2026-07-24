<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class BackgroundTypeFill
{
    public function __construct(
        public string         $type,
        public BackgroundFill $fill,
        public int            $darkThemeDimming,
        public array          $raw              = []
    )
    {
    }
}
