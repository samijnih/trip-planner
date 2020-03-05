<?php

declare(strict_types=1);

namespace Domain\Agency;

use Ramsey\Uuid\UuidInterface;

interface AgencyId
{
    /**
     * @param  UuidInterface $uuid
     *
     * @return AgencyId
     */
    public static function fromUuid(UuidInterface $uuid): AgencyId;

    /**
     * @param  string $uuid
     *
     * @return AgencyId
     */
    public static function fromString(string $uuid): AgencyId;

    /**
     * @return string
     */
    public function toString(): string;
}