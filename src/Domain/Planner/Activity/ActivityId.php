<?php

declare(strict_types=1);

namespace Domain\Planner\Activity;

use Ramsey\Uuid\UuidInterface;

interface ActivityId
{
    /**
     * @param  UuidInterface $uuid
     *
     * @return ActivityId
     */
    public static function fromUuid(UuidInterface $uuid): ActivityId;

    /**
     * @param  string $uuid
     *
     * @return ActivityId
     */
    public static function fromString(string $uuid): ActivityId;

    /**
     * @return string
     */
    public function toString(): string;
}