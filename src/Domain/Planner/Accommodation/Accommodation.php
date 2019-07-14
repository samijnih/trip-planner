<?php

declare(strict_types=1);

namespace Domain\Planner\Accommodation;

use Domain\Library\Accommodation\AccommodationTemplateId;
use Domain\Picture\PictureIdSet;
use Domain\Place\PlaceId;
use Domain\Text\LocalizedDetail;

final class Accommodation
{
    /**
     * @var AccommodationId
     */
    private $id;

    /**
     * @var AccommodationTemplateId
     */
    private $templateId;

    /**
     * @var LocalizedDetail
     */
    private $localizedDetail;

    /**
     * @var Meals
     */
    private $meals;

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
     * @param AccommodationId         $id
     * @param AccommodationTemplateId $templateId
     * @param LocalizedDetail         $localizedDetail
     * @param Meals                   $meals
     * @param PlaceId                 $placeId
     * @param PictureIdSet            $pictures
     */
    public function __construct(
        AccommodationId $id,
        AccommodationTemplateId $templateId,
        LocalizedDetail $localizedDetail,
        Meals $meals,
        PlaceId $placeId,
        PictureIdSet $pictures
    ) {
        $this->id = $id;
        $this->templateId = $templateId;
        $this->localizedDetail = $localizedDetail;
        $this->meals = $meals;
        $this->placeId = $placeId;
        $this->pictures = $pictures;
    }

    /**
     * @param  AccommodationId         $id
     * @param  AccommodationTemplateId $templateId
     * @param  LocalizedDetail         $localizedDetail
     * @param  Meals                   $meals
     * @param  PlaceId                 $placeId
     * @param  PictureIdSet            $pictures
     *
     * @return Accommodation
     */
    public static function create(
        AccommodationId $id,
        AccommodationTemplateId $templateId,
        LocalizedDetail $localizedDetail,
        Meals $meals,
        PlaceId $placeId,
        PictureIdSet $pictures
    ): Accommodation {
        return new self(
            $id,
            $templateId,
            $localizedDetail,
            $meals,
            $placeId,
            $pictures
        );
    }
}