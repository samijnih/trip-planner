<?php

declare(strict_types=1);

namespace Domain\Place;

interface PlaceId
{
    /**
     * @param  string $id
     *
     * @return PlaceId
     */
    public static function fromId(string $id): PlaceId;

    /**
     * @return string
     */
    public function toString(): string;

    /**
     * {@inheritDoc}
     */
    public function __toString();
}