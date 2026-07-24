<?php
declare(strict_types=1);

namespace Telix\Update;

use Telix\Type\Update;

interface UpdateSourceInterface
{
    public function updates(): iterable;
}
