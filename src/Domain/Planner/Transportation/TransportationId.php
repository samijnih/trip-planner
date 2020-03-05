<?php

declare(strict_types=1);

namespace Domain\Planner\Transportation;

use Ramsey\Uuid\UuidInterface;

interface TransportationId
{
    /**
     * @param  UuidInterface $uuid
     *
     * @return TransportationId
     */
    public static function fromUuid(UuidInterface $uuid): TransportationId;

    /**
     * @param  string $uuid
     *
     * @return TransportationId
     */
    public static function fromString(string $uuid): TransportationId;

    /**
     * @return string
     */
    public function toString(): string;
}