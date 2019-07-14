<?php

declare(strict_types=1);

namespace Domain\Planner\Activity;

use Domain\Library\Activity\ActivityTemplateId;
use Domain\Picture\PictureIdSet;
use Domain\Place\PlaceId;
use Domain\Text\LocalizedDetail;

final class Activity
{
    /**
     * @var ActivityId
     */
    private $id;

    /**
     * @var ActivityTemplateId
     */
    private $templateId;

    /**
     * @var LocalizedDetail
     */
    private $localizedDetail;

    /**
     * @var PlaceId
     */
    private $placeId;

    /**
     * @var PictureIdSet
     */
    private $pictures;

    /**
     * Constructor.
     *
     * @param ActivityId         $id
     * @param ActivityTemplateId $templateId
     * @param LocalizedDetail    $localizedDetail
     * @param PlaceId            $placeId
     * @param PictureIdSet       $pictures
     */
    public function __construct(
        ActivityId $id,
        ActivityTemplateId $templateId,
        LocalizedDetail $localizedDetail,
        PlaceId $placeId,
        PictureIdSet $pictures
    ) {
        $this->id = $id;
        $this->templateId = $templateId;
        $this->localizedDetail = $localizedDetail;
        $this->placeId = $placeId;
        $this->pictures = $pictures;
    }

    /**
     * @param  ActivityId         $id
     * @param  ActivityTemplateId $templateId
     * @param  LocalizedDetail    $localizedDetail
     * @param  PlaceId            $placeId
     * @param  PictureIdSet       $pictures
     *
     * @return Activity
     */
    public static function create(
        ActivityId $id,
        ActivityTemplateId $templateId,
        LocalizedDetail $localizedDetail,
        PlaceId $placeId,
        PictureIdSet $pictures
    ): Activity {
        return new self(
            $id,
            $templateId,
            $localizedDetail,
            $placeId,
            $pictures
        );
    }
}