<?php
declare(strict_types=1);

namespace Telix\Client;

use Telix\Method\MethodInterface;

interface ClientInterface
{
    public function call(MethodInterface $method): mixed;
}
