<?php

declare(strict_types=1);

namespace Domain\Library\Accommodation;

use Ramsey\Uuid\UuidInterface;

interface AccommodationTemplateId
{
    /**
     * @param  UuidInterface $uuid
     *
     * @return AccommodationTemplateId
     */
    public static function fromUuid(UuidInterface $uuid): AccommodationTemplateId;

    /**
     * @param  string $uuid
     *
     * @return AccommodationTemplateId
     */
    public static function fromString(string $uuid): AccommodationTemplateId;

    /**
     * @return string
     */
    public function toString(): string;
}
