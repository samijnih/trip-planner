<?php

declare(strict_types=1);

namespace Domain\Service;

use DateTimeImmutable;

interface Clock
{
    public function now(): DateTimeImmutable;
}
