<?php

declare(strict_types=1);

namespace Domain\Request;

use Ramsey\Uuid\UuidInterface;

final class RequestUuid implements RequestId
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
     * @return RequestId
     */
    public function fromUuid(UuidInterface $uuid): RequestId
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

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return $this->uuid->toString();
    }
}