<?php

declare(strict_types=1);

namespace Domain\Picture;

use Ramsey\Uuid\UuidInterface;

interface PictureId
{
    /**
     * @param  UuidInterface $uuid
     *
     * @return PictureId
     */
    public static function fromUuid(UuidInterface $uuid): PictureId;

    /**
     * @return string
     */
    public function toString(): string;

    /**
     * {@inheritDoc}
     */
    public function __toString();
}