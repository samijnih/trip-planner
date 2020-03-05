<?php

declare(strict_types=1);

namespace Domain\Planner\Step;

use Domain\Library\Transportation\TransportationTemplateId;
use Domain\Planner\Transportation\TransportationId;
use Domain\Text\LocalizedDetail;
use Domain\Planner\Transportation\DepartureToArrival;
use Domain\Planner\Transportation\Distance;
use Domain\Planner\Transportation\RouteType;
use Domain\Planner\Transportation\Time;
use Domain\Planner\Transportation\Transportation;
use LogicException;

trait Transportations
{
    /**
     * @var Transportation[]
     */
    private $transportations;

    /**
     * @var Transportation[]
     */
    private $alternativeTransportations;

    /**
     * @param  TransportationId         $transportationId
     * @param  TransportationTemplateId $templateId
     * @param  LocalizedDetail          $localizedDetail
     * @param  RouteType                $routeType
     * @param  DepartureToArrival       $departureToArrival
     * @param  Distance                 $distance
     * @param  Time                     $time
     *
     * @return Transportation
     */
    private function buildTransportation(
        TransportationId $transportationId,
        TransportationTemplateId $templateId,
        LocalizedDetail $localizedDetail,
        RouteType $routeType,
        DepartureToArrival $departureToArrival,
        Distance $distance,
        Time $time
    ): Transportation {
        return Transportation::create(
            $transportationId,
            $templateId,
            $localizedDetail,
            $routeType,
            $departureToArrival,
            $distance,
            $time
        );
    }

    /**
     * @param TransportationId         $transportationId
     * @param TransportationTemplateId $templateId
     * @param LocalizedDetail          $localizedDetail
     * @param RouteType                $routeType
     * @param DepartureToArrival       $departureToArrival
     * @param Distance                 $distance
     * @param Time                     $time
     */
    public function addATransportation(
        TransportationId $transportationId,
        TransportationTemplateId $templateId,
        LocalizedDetail $localizedDetail,
        RouteType $routeType,
        DepartureToArrival $departureToArrival,
        Distance $distance,
        Time $time
    ): void {
        if ($this->hasTransportation($transportationId)) {
            throw new LogicException("Cannot add Transportation $transportationId because it does exist on Step $this->id");
        }

        $this->transportations[$transportationId->toString()] = $this->buildTransportation(
            $transportationId,
            $templateId,
            $localizedDetail,
            $routeType,
            $departureToArrival,
            $distance,
            $time
        );
    }

    /**
     * @param TransportationId         $transportationId
     * @param TransportationTemplateId $templateId
     * @param LocalizedDetail          $localizedDetail
     * @param RouteType                $routeType
     * @param DepartureToArrival       $departureToArrival
     * @param Distance                 $distance
     * @param Time                     $time
     */
    public function addAnAlternativeTransportation(
        TransportationId $transportationId,
        TransportationTemplateId $templateId,
        LocalizedDetail $localizedDetail,
        RouteType $routeType,
        DepartureToArrival $departureToArrival,
        Distance $distance,
        Time $time
    ): void {
        if ($this->hasAlternativeTransportation($transportationId)) {
            throw new LogicException("Cannot add alternative Transportation $transportationId because it does exist on Step $this->id");
        }

        $this->alternativeTransportations[$transportationId->toString()] = $this->buildTransportation(
            $transportationId,
            $templateId,
            $localizedDetail,
            $routeType,
            $departureToArrival,
            $distance,
            $time
        );
    }

    /**
     * @param TransportationId $transportationId
     */
    public function removeATransportation(TransportationId $transportationId): void
    {
        if (!$this->hasTransportation($transportationId)) {
            throw new LogicException("Cannot remove Transportation $transportationId because it does not exist on Step $this->id");
        }

        unset($this->transportations[$transportationId->toString()]);
    }

    /**
     * @param TransportationId $transportationId
     */
    public function removeAnAlternativeTransportation(TransportationId $transportationId): void
    {
        if (!$this->hasAlternativeTransportation($transportationId)) {
            throw new LogicException("Cannot remove alternative Transportation $transportationId because it does not exist on Step $this->id");
        }

        unset($this->alternativeTransportations[$transportationId->toString()]);
    }

    /**
     * @param  TransportationId $transportationId
     *
     * @return bool
     */
    private function hasTransportation(TransportationId $transportationId): bool
    {
        return isset($this->transportations[$transportationId->toString()]);
    }

    /**
     * @param  TransportationId $transportationId
     *
     * @return bool
     */
    private function hasAlternativeTransportation(TransportationId $transportationId): bool
    {
        return isset($this->alternativeTransportations[$transportationId->toString()]);
    }
}
