<?php

declare(strict_types=1);

namespace Domain\Library\Activity;

use Ramsey\Uuid\UuidInterface;

interface ActivityTemplateId
{
    /**
     * @param  UuidInterface $uuid
     *
     * @return ActivityTemplateId
     */
    public static function fromUuid(UuidInterface $uuid): ActivityTemplateId;

    /**
     * @param  string $uuid
     *
     * @return ActivityTemplateId
     */
    public static function fromString(string $uuid): ActivityTemplateId;

    /**
     * @return string
     */
    public function toString(): string;
}