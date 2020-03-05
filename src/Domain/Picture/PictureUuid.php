<?php

declare(strict_types=1);

namespace Domain\Picture;

use Ramsey\Uuid\UuidInterface;

final class PictureUuid implements PictureId
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
     * @param  UuidInterface $uuid
     *
     * @return PictureId
     */
    public static function fromUuid(UuidInterface $uuid): PictureId
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
        return $this->toString();
    }
}