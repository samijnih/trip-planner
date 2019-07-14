<?php

declare(strict_types=1);

namespace Domain\Planner\Accommodation;

use Ramsey\Uuid\UuidInterface;

interface AccommodationId
{
    /**
     * @param  UuidInterface $uuid
     *
     * @return AccommodationId
     */
    public static function fromUuid(UuidInterface $uuid): AccommodationId;

    /**
     * @param  string $uuid
     *
     * @return AccommodationId
     */
    public static function fromString(string $uuid): AccommodationId;

    /**
     * @return string
     */
    public function toString(): string;
}
