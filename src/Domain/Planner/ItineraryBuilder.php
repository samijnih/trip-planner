<?php

declare(strict_types=1);

namespace Domain\Planner;

use Domain\Library\Accommodation\AccommodationTemplateId;
use Domain\Library\Activity\ActivityTemplateId;
use Domain\Library\Step\StepTemplateId;
use Domain\Library\Transportation\TransportationTemplateId;
use Domain\Picture\PictureIdSet;
use Domain\Place\PlaceId;
use Domain\Place\PlaceIdSet;
use Domain\Planner\Accommodation\AccommodationId;
use Domain\Planner\Accommodation\AccommodationUuid;
use Domain\Planner\Accommodation\Meals;
use Domain\Planner\Activity\ActivityId;
use Domain\Planner\Activity\ActivityUuid;
use Domain\Planner\Step\Duration;
use Domain\Planner\Step\Step;
use Domain\Planner\Step\StepId;
use Domain\Planner\Step\StepUuid;
use Domain\Planner\Transportation\DepartureToArrival;
use Domain\Planner\Transportation\Distance;
use Domain\Planner\Transportation\RouteType;
use Domain\Planner\Transportation\Time;
use Domain\Planner\Transportation\TransportationId;
use Domain\Planner\Transportation\TransportationUuid;
use Domain\Text\LocalizedDetail;
use LogicException;
use Ramsey\Uuid\UuidInterface;

trait ItineraryBuilder
{
    /**
     * @var Step[]
     */
    private $steps;

    /**
     * @param UuidInterface   $stepId
     * @param StepTemplateId  $templateId
     * @param LocalizedDetail $localizedDetail
     * @param Duration        $duration
     * @param PlaceIdSet      $places
     * @param PictureIdSet    $pictures
     */
    public function addAStep(
        UuidInterface $stepId,
        StepTemplateId $templateId,
        LocalizedDetail $localizedDetail,
        Duration $duration,
        PlaceIdSet $places,
        PictureIdSet $pictures
    ): void {
        $stepId = StepUuid::fromUuid($stepId);

        if ($this->hasStep($stepId)) {
            throw new LogicException("Cannot add Step $stepId because it does exist on Trip $this->id");
        }
        if (!$places->hasCountBetween(self::MIN_STEP_PLACE_COUNT, self::MAX_STEP_PLACE_COUNT)) {
            throw new \LengthException(sprintf(
                'Step %s must have %d to %d places.',
                $stepId,
                self::MIN_STEP_PLACE_COUNT,
                self::MAX_STEP_PLACE_COUNT
            ));
        }

        $this->steps[$stepId->toString()] = Step::create(
            $stepId,
            $templateId,
            $localizedDetail,
            $duration,
            $places,
            $pictures
        );
    }

    /**
     * @param StepId $stepId
     */
    public function removeAStep(StepId $stepId): void
    {
        if (!$this->hasStep($stepId)) {
            throw new LogicException("Cannot remove Step $stepId because it does not exist on Trip $this->id");
        }

        unset($this->steps[$stepId->toString()]);
    }

    /**
     * @param  StepId $stepId
     *
     * @return bool
     */
    private function hasStep(StepId $stepId): bool
    {
        return isset($this->steps[$stepId->toString()]);
    }

    /**
     * @param  StepId $stepId
     *
     * @return Step
     */
    private function getStep(StepId $stepId): Step
    {
        if (!$this->hasStep($stepId)) {
            throw new \LogicException("Cannot find Step $stepId on Trip $this->id");
        }

        return $this->steps[$stepId->toString()];
    }

    /**
     * @param StepId                  $stepId
     * @param UuidInterface           $accommodationId
     * @param AccommodationTemplateId $templateId
     * @param LocalizedDetail         $localizedDetail
     * @param Meals                   $meals
     * @param PlaceId                 $place
     * @param PictureIdSet            $pictures
     */
    public function addAnAccommodationToStep(
        StepId $stepId,
        UuidInterface $accommodationId,
        AccommodationTemplateId $templateId,
        LocalizedDetail $localizedDetail,
        Meals $meals,
        PlaceId $place,
        PictureIdSet $pictures
    ): void {
        $this->getStep($stepId)->addAnAccommodation(
            AccommodationUuid::fromUuid($accommodationId),
            $templateId,
            $localizedDetail,
            $meals,
            $place,
            $pictures
        );
    }

    /**
     * @param StepId                  $stepId
     * @param UuidInterface           $accommodationId
     * @param AccommodationTemplateId $templateId
     * @param LocalizedDetail         $localizedDetail
     * @param Meals                   $meals
     * @param PlaceId                 $place
     * @param PictureIdSet            $pictures
     */
    public function addAnAlternativeAccommodationToStep(
        StepId $stepId,
        UuidInterface $accommodationId,
        AccommodationTemplateId $templateId,
        LocalizedDetail $localizedDetail,
        Meals $meals,
        PlaceId $place,
        PictureIdSet $pictures
    ): void {
        $this->getStep($stepId)->addAnAlternativeAccommodation(
            AccommodationUuid::fromUuid($accommodationId),
            $templateId,
            $localizedDetail,
            $meals,
            $place,
            $pictures
        );
    }

    /**
     * @param StepId $stepId
     */
    public function removeAccommodationOfStep(StepId $stepId): void
    {
        $this->getStep($stepId)->removeAccommodation();
    }

    /**
     * @param StepId          $stepId
     * @param AccommodationId $accommodationId
     */
    public function removeAnAlternativeAccommodationOfStep(
        StepId $stepId,
        AccommodationId $accommodationId
    ): void {
        $this->getStep($stepId)->removeAnAlternativeAccommodation($accommodationId);
    }

    /**
     * @param StepId             $stepId
     * @param UuidInterface      $activityId
     * @param ActivityTemplateId $templateId
     * @param LocalizedDetail    $localizedDetail
     * @param PlaceId            $place
     * @param PictureIdSet       $pictures
     */
    public function addAnActivityToStep(
        StepId $stepId,
        UuidInterface $activityId,
        ActivityTemplateId $templateId,
        LocalizedDetail $localizedDetail,
        PlaceId $place,
        PictureIdSet $pictures
    ): void {
        $this->getStep($stepId)->addAnActivity(
            ActivityUuid::fromUuid($activityId),
            $templateId,
            $localizedDetail,
            $place,
            $pictures
        );
    }

    /**
     * @param StepId             $stepId
     * @param UuidInterface      $activityId
     * @param ActivityTemplateId $templateId
     * @param LocalizedDetail    $localizedDetail
     * @param PlaceId            $place
     * @param PictureIdSet       $pictures
     */
    public function addAnAlternativeActivityToStep(
        StepId $stepId,
        UuidInterface $activityId,
        ActivityTemplateId $templateId,
        LocalizedDetail $localizedDetail,
        PlaceId $place,
        PictureIdSet $pictures
    ): void {
        $this->getStep($stepId)->addAnAlternativeActivity(
            ActivityUuid::fromUuid($activityId),
            $templateId,
            $localizedDetail,
            $place,
            $pictures
        );
    }

    /**
     * @param StepId     $stepId
     * @param ActivityId $activityId
     */
    public function removeAnActivityOfStep(
        StepId $stepId,
        ActivityId $activityId
    ): void {
        $this->getStep($stepId)->removeAnActivity($activityId);
    }

    /**
     * @param StepId     $stepId
     * @param ActivityId $activityId
     */
    public function removeAnAlternativeActivityOfStep(
        StepId $stepId,
        ActivityId $activityId
    ): void {
        $this->getStep($stepId)->removeAnAlternativeActivity($activityId);
    }

    /**
     * @param StepId                   $stepId
     * @param UuidInterface            $transportationId
     * @param TransportationTemplateId $templateId
     * @param LocalizedDetail          $localizedDetail
     * @param RouteType                $routeType
     * @param DepartureToArrival       $departureToArrival
     * @param Distance                 $distance
     * @param Time                     $time
     */
    public function addATransportationToStep(
        StepId $stepId,
        UuidInterface $transportationId,
        TransportationTemplateId $templateId,
        LocalizedDetail $localizedDetail,
        RouteType $routeType,
        DepartureToArrival $departureToArrival,
        Distance $distance,
        Time $time
    ): void {
        $this->getStep($stepId)->addATransportation(
            TransportationUuid::fromUuid($transportationId),
            $templateId,
            $localizedDetail,
            $routeType,
            $departureToArrival,
            $distance,
            $time
        );
    }

    /**
     * @param StepId                   $stepId
     * @param UuidInterface            $transportationId
     * @param TransportationTemplateId $templateId
     * @param LocalizedDetail          $localizedDetail
     * @param RouteType                $routeType
     * @param DepartureToArrival       $departureToArrival
     * @param Distance                 $distance
     * @param Time                     $time
     */
    public function addAnAlternativeTransportationToStep(
        StepId $stepId,
        UuidInterface $transportationId,
        TransportationTemplateId $templateId,
        LocalizedDetail $localizedDetail,
        RouteType $routeType,
        DepartureToArrival $departureToArrival,
        Distance $distance,
        Time $time
    ): void {
        $this->getStep($stepId)->addAnAlternativeTransportation(
            TransportationUuid::fromUuid($transportationId),
            $templateId,
            $localizedDetail,
            $routeType,
            $departureToArrival,
            $distance,
            $time
        );
    }

    /**
     * @param StepId           $stepId
     * @param TransportationId $transportationId
     */
    public function removeATransportationOfStep(
        StepId $stepId,
        TransportationId $transportationId

    ): void {
        $this->getStep($stepId)->removeATransportation($transportationId);
    }

    /**
     * @param StepId           $stepId
     * @param TransportationId $transportationId
     */
    public function removeAnAlternativeTransportationOfStep(
        StepId $stepId,
        TransportationId $transportationId
    ): void {
        $this->getStep($stepId)->removeAnAlternativeTransportation($transportationId);
    }
}