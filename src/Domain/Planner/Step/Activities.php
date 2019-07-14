<?php

declare(strict_types=1);

namespace Domain\Planner\Step;

use Domain\Library\Activity\ActivityTemplateId;
use Domain\Picture\PictureIdSet;
use Domain\Place\PlaceId;
use Domain\Planner\Activity\Activity;
use Domain\Planner\Activity\ActivityId;
use Domain\Text\LocalizedDetail;
use LogicException;

trait Activities
{
    /**
     * @var Activity[]
     */
    private $activities;

    /**
     * @var Activity[]
     */
    private $alternativeActivities;

    /**
     * @param  ActivityId         $activityId
     * @param  ActivityTemplateId $templateId
     * @param  LocalizedDetail    $localizedDetail
     * @param  PlaceId            $placeId
     * @param  PictureIdSet       $pictures
     *
     * @return Activity
     */
    private function buildActivity(
        ActivityId $activityId,
        ActivityTemplateId $templateId,
        LocalizedDetail $localizedDetail,
        PlaceId $placeId,
        PictureIdSet $pictures
    ): Activity {
        return Activity::create(
            $activityId,
            $templateId,
            $localizedDetail,
            $placeId,
            $pictures
        );
    }

    /**
     * @param ActivityId         $activityId
     * @param ActivityTemplateId $templateId
     * @param LocalizedDetail    $localizedDetail
     * @param PlaceId            $placeId
     * @param PictureIdSet       $pictures
     */
    public function addAnActivity(
        ActivityId $activityId,
        ActivityTemplateId $templateId,
        LocalizedDetail $localizedDetail,
        PlaceId $placeId,
        PictureIdSet $pictures
    ): void {
        if ($this->hasActivity($activityId)) {
            throw new LogicException("Cannot add Activity $activityId because it does exist on Step $this->id");
        }

        $this->activities[$activityId->toString()] = $this->buildActivity(
            $activityId,
            $templateId,
            $localizedDetail,
            $placeId,
            $pictures
        );
    }

    /**
     * @param ActivityId         $activityId
     * @param ActivityTemplateId $templateId
     * @param LocalizedDetail    $localizedDetail
     * @param PlaceId            $placeId
     * @param PictureIdSet       $pictures
     */
    public function addAnAlternativeActivity(
        ActivityId $activityId,
        ActivityTemplateId $templateId,
        LocalizedDetail $localizedDetail,
        PlaceId $placeId,
        PictureIdSet $pictures
    ): void {
        if ($this->hasAlternativeActivity($activityId)) {
            throw new LogicException("Cannot add alternative Activity $activityId because it does exist on Step $this->id");
        }

        $this->alternativeActivities[$activityId->toString()] = $this->buildActivity(
            $activityId,
            $templateId,
            $localizedDetail,
            $placeId,
            $pictures
        );
    }

    /**
     * @param ActivityId $activityId
     */
    public function removeAnActivity(ActivityId $activityId): void
    {
        if (!$this->hasActivity($activityId)) {
            throw new LogicException("Cannot remove Activity $activityId because it does not exist on Step $this->id");
        }

        unset($this->activities[$activityId->toString()]);
    }

    /**
     * @param ActivityId $activityId
     */
    public function removeAnAlternativeActivity(ActivityId $activityId): void
    {
        if (!$this->hasAlternativeActivity($activityId)) {
            throw new LogicException("Cannot remove alternative Activity $activityId because it does not exist on Step $this->id");
        }

        unset($this->alternativeActivities[$activityId->toString()]);
    }

    /**
     * @param  ActivityId $activityId
     *
     * @return bool
     */
    private function hasActivity(ActivityId $activityId): bool
    {
        return isset($this->activities[$activityId->toString()]);
    }

    /**
     * @param  ActivityId $activityId
     *
     * @return bool
     */
    private function hasAlternativeActivity(ActivityId $activityId): bool
    {
        return isset($this->alternativeActivities[$activityId->toString()]);
    }
}
