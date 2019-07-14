<?php

declare(strict_types=1);

namespace Domain\Planner\Transportation;

use Domain\Library\Transportation\TransportationTemplateId;
use Domain\Text\LocalizedDetail;

final class Transportation
{
    /**
     * @var TransportationId
     */
    private $id;

    /**
     * @var TransportationTemplateId
     */
    private $templateId;

    /**
     * @var LocalizedDetail
     */
    private $localizedDetail;

    /**
     * @var RouteType
     */
    private $routeType;

    /**
     * @var DepartureToArrival
     */
    private $departureToArrival;

    /**
     * @var Distance
     */
    private $distance;

    /**
     * @var Time
     */
    private $time;

    /**
     * Constructor.
     *
     * @param TransportationId         $id
     * @param TransportationTemplateId $templateId
     * @param LocalizedDetail          $localizedDetail
     * @param RouteType                $routeType
     * @param DepartureToArrival       $departureToArrival
     * @param Distance                 $distance
     * @param Time                     $time
     */
    public function __construct(
        TransportationId $id,
        TransportationTemplateId $templateId,
        LocalizedDetail $localizedDetail,
        RouteType $routeType,
        DepartureToArrival $departureToArrival,
        Distance $distance,
        Time $time
    ) {
        $this->id = $id;
        $this->templateId = $templateId;
        $this->localizedDetail = $localizedDetail;
        $this->routeType = $routeType;
        $this->departureToArrival = $departureToArrival;
        $this->distance = $distance;
        $this->time = $time;
    }

    /**
     * @param  TransportationId         $id
     * @param  TransportationTemplateId $templateId
     * @param  LocalizedDetail          $localizedDetail
     * @param  RouteType                $routeType
     * @param  DepartureToArrival       $departureToArrival
     * @param  Distance                 $distance
     * @param  Time                     $time
     *
     * @return Transportation
     */
    public static function create(
        TransportationId $id,
        TransportationTemplateId $templateId,
        LocalizedDetail $localizedDetail,
        RouteType $routeType,
        DepartureToArrival $departureToArrival,
        Distance $distance,
        Time $time
    ): Transportation {
        return new self(
            $id,
            $templateId,
            $localizedDetail,
            $routeType,
            $departureToArrival,
            $distance,
            $time
        );
    }
}
