<?php

declare(strict_types=1);

namespace Domain\Service;

use DateTimeImmutable;

final class ImmutableDateTimeClock implements Clock
{
    /**
     * @return DateTimeImmutable
     */
    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable();
    }
}