<?php

declare(strict_types=1);

namespace Domain\Library\Transportation;

use Ramsey\Uuid\UuidInterface;

interface TransportationTemplateId
{
    /**
     * @param  UuidInterface $uuid
     *
     * @return TransportationTemplateId
     */
    public static function fromUuid(UuidInterface $uuid): TransportationTemplateId;

    /**
     * @param  string $uuid
     *
     * @return TransportationTemplateId
     */
    public static function fromString(string $uuid): TransportationTemplateId;

    /**
     * @return string
     */
    public function toString(): string;
}