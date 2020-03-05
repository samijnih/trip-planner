<?php

declare(strict_types=1);

namespace Domain\Planner\Step;

use Domain\Library\Step\StepTemplateId;
use Domain\Picture\PictureIdSet;
use Domain\Place\PlaceIdSet;
use Domain\Text\LocalizedDetail;

final class Step
{
    use Accommodations, Activities, Transportations;

    /**
     * @var StepId
     */
    private $id;

    /**
     * @var StepTemplateId
     */
    private $templateId;

    /**
     * @var LocalizedDetail
     */
    private $localizedDetail;

    /**
     * @var Duration
     */
    private $duration;

    /**
     * @var PlaceIdSet
     */
    private $places;

    /**
     * @var PictureIdSet
     */
    private $pictures;

    /**
     * Constructor.
     *
     * @param StepId          $id
     * @param StepTemplateId  $templateId
     * @param LocalizedDetail $localizedDetail
     * @param Duration        $duration
     * @param PlaceIdSet      $places
     * @param PictureIdSet    $pictures
     */
    private function __construct(
        StepId $id,
        StepTemplateId $templateId,
        LocalizedDetail $localizedDetail,
        Duration $duration,
        PlaceIdSet $places,
        PictureIdSet $pictures
    ) {
        $this->id = $id;
        $this->templateId = $templateId;
        $this->localizedDetail = $localizedDetail;
        $this->duration = $duration;
        $this->places = $places;
        $this->pictures = $pictures;

        $this->accommodation = null;
        $this->alternativeAccommodations = [];
        $this->activities = [];
        $this->alternativeActivities = [];
        $this->transportations = [];
        $this->alternativeTransportations = [];
    }

    /**
     * @param  StepId          $id
     * @param  StepTemplateId  $templateId
     * @param  LocalizedDetail $localizedDetail
     * @param  Duration        $duration
     * @param  PlaceIdSet      $places
     * @param  PictureIdSet    $pictures
     *
     * @return Step
     */
    public static function create(
        StepId $id,
        StepTemplateId $templateId,
        LocalizedDetail $localizedDetail,
        Duration $duration,
        PlaceIdSet $places,
        PictureIdSet $pictures
    ): Step {
        return new self(
            $id,
            $templateId,
            $localizedDetail,
            $duration,
            $places,
            $pictures
        );
    }
}
