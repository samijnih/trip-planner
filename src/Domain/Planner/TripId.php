<?php

declare(strict_types=1);

namespace Domain\Planner;

use Ramsey\Uuid\UuidInterface;

interface TripId
{
    /**
     * @param  UuidInterface $uuid
     *
     * @return TripId
     */
    public static function fromUuid(UuidInterface $uuid): TripId;

    /**
     * @return string
     */
    public function toString(): string;
}
