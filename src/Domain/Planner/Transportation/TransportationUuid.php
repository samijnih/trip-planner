<?php

declare(strict_types=1);

namespace Domain\Planner\Transportation;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

final class TransportationUuid implements TransportationId
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
    public static function fromUuid(UuidInterface $uuid): TransportationId
    {
        return new self($uuid);
    }

    /**
     * {@inheritDoc}
     */
    public static function fromString(string $uuid): TransportationId
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