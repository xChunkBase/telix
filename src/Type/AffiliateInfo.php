<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class AffiliateInfo
{
    public function __construct(
        public int   $commissionPerMille,
        public int   $amount,
        public ?User $affiliateUser      = null,
        public ?Chat $affiliateChat      = null,
        public ?int  $nanostarAmount     = null,
        public array $raw                = []
    )
    {
    }
}
