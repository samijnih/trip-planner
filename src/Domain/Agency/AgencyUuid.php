<?php

declare(strict_types=1);

namespace Domain\Agency;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

final class AgencyUuid implements AgencyId
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
    public static function fromUuid(UuidInterface $uuid): AgencyId
    {
        return new self($uuid);
    }

    /**
     * {@inheritDoc}
     */
    public static function fromString(string $uuid): AgencyId
    {
        return new self(Uuid::fromString($uuid));
    }

    /**
     * @return AgencyId
     */
    public static function generate(): AgencyId
    {
        return self::fromUuid(Uuid::uuid4());
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