<?php

declare(strict_types=1);

namespace Domain\Planner\Activity;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

final class ActivityUuid implements ActivityId
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
    public static function fromUuid(UuidInterface $uuid): ActivityId
    {
        return new self($uuid);
    }

    /**
     * {@inheritDoc}
     */
    public static function fromString(string $uuid): ActivityId
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