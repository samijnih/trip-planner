<?php

declare(strict_types=1);

namespace Domain\Planner;

use Ramsey\Uuid\UuidInterface;

final class TripUuid implements TripId
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
    public function __construct(UuidInterface $uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @param  UuidInterface $uuid
     *
     * @return TripId
     */
    public function fromUuid(UuidInterface $uuid): TripId
    {
        return new self($uuid);
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->uuid->toString();
    }
}