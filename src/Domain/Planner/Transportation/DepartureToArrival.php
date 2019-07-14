<?php

declare(strict_types=1);

namespace Domain\Planner\Transportation;

use Domain\Place\PlaceId;

final class DepartureToArrival
{
    /**
     * @var PlaceId
     */
    private $departurePlaceId;

    /**
     * @var PlaceId
     */
    private $arrivalPlaceId;

    /**
     * Constructor.
     *
     * @param PlaceId $departurePlaceId
     * @param PlaceId $arrivalPlaceId
     */
    public function __construct(PlaceId $departurePlaceId, PlaceId $arrivalPlaceId)
    {
        $this->departurePlaceId = $departurePlaceId;
        $this->arrivalPlaceId = $arrivalPlaceId;
    }

    /**
     * @return PlaceId
     */
    public function departurePlaceId(): PlaceId
    {
        return $this->departurePlaceId;
    }

    /**
     * @return PlaceId
     */
    public function arrivalPlaceId(): PlaceId
    {
        return $this->arrivalPlaceId;
    }
}
