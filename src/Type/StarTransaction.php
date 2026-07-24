<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class StarTransaction
{
    public function __construct(
        public string              $id,
        public int                 $amount,
        public int                 $date,
        public ?int                $nanostarAmount = null,
        public ?TransactionPartner $source         = null,
        public ?TransactionPartner $receiver       = null,
        public array               $raw            = []
    )
    {
    }
}
