<?php

declare(strict_types=1);

namespace Domain\Place;

final class GeonameId implements PlaceId
{
    /**
     * @var string
     */
    private $id;

    /**
     * Constructor.
     *
     * @param string $id
     */
    private function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @param  string $id
     *
     * @return PlaceId
     */
    public static function fromId(string $id): PlaceId
    {
        if (!is_numeric($id)) {
            throw new \LogicException('Geoname identifier is not numeric.');
        }

        return new self($id);
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return $this->toString();
    }
}