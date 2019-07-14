<?php

declare(strict_types=1);

namespace Domain\Library\Step;

use Ramsey\Uuid\UuidInterface;

interface StepTemplateId
{
    /**
     * @param  UuidInterface $uuid
     *
     * @return StepTemplateId
     */
    public static function fromUuid(UuidInterface $uuid): StepTemplateId;

    /**
     * @param  string $uuid
     *
     * @return StepTemplateId
     */
    public static function fromString(string $uuid): StepTemplateId;

    /**
     * @return string
     */
    public function toString(): string;
}
