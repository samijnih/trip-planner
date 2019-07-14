<?php

declare(strict_types=1);

namespace Domain\Planner\Step;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

final class StepUuid implements StepId
{
    /**
     * @var UuidInterface
     */
    private $uuid;

    /**
     * Constructor.
     *
     * @param UuidInterface $uuid
     */
    private function __construct(UuidInterface $uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * {@inheritDoc}
     */
    public static function fromUuid(UuidInterface $uuid): StepId
    {
        return new self($uuid);
    }

    /**
     * {@inheritDoc}
     */
    public static function fromString(string $uuid): StepId
    {
        return new self(Uuid::fromString($uuid));
    }

    /**
     * {@inheritDoc}
     */
    public function toString(): string
    {
        return $this->uuid->toString();
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return $this->uuid->toString();
    }
}