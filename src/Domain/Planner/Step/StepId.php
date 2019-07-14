<?php

declare(strict_types=1);

namespace Domain\Planner\Step;

use Ramsey\Uuid\UuidInterface;

interface StepId
{
    /**
     * @param  UuidInterface $uuid
     *
     * @return StepId
     */
    public static function fromUuid(UuidInterface $uuid): StepId;

    /**
     * @param  string $uuid
     *
     * @return StepId
     */
    public static function fromString(string $uuid): StepId;

    /**
     * @return string
     */
    public function toString(): string;
}
