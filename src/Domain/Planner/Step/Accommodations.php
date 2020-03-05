<?php

declare(strict_types=1);

namespace Domain\Planner\Step;

use Domain\Library\Accommodation\AccommodationTemplateId;
use Domain\Picture\PictureIdSet;
use Domain\Place\PlaceId;
use Domain\Planner\Accommodation\Accommodation;
use Domain\Planner\Accommodation\AccommodationId;
use Domain\Planner\Accommodation\Meals;
use Domain\Text\LocalizedDetail;
use LogicException;

trait Accommodations
{
    /**
     * @var null|Accommodation
     */
    private $accommodation;

    /**
     * @var Accommodation[]
     */
    private $alternativeAccommodations;

    /**
     * @param  AccommodationId         $accommodationId
     * @param  AccommodationTemplateId $templateId
     * @param  LocalizedDetail         $localizedDetail
     * @param  Meals                   $meals
     * @param  PlaceId                 $placeId
     * @param  PictureIdSet            $pictures
     *
     * @return Accommodation
     */
    private function buildAccommodation(
        AccommodationId $accommodationId,
        AccommodationTemplateId $templateId,
        LocalizedDetail $localizedDetail,
        Meals $meals,
        PlaceId $placeId,
        PictureIdSet $pictures
    ): Accommodation {
        return Accommodation::create(
            $accommodationId,
            $templateId,
            $localizedDetail,
            $meals,
            $placeId,
            $pictures
        );
    }

    /**
     * @param AccommodationId         $accommodationId
     * @param AccommodationTemplateId $templateId
     * @param LocalizedDetail         $localizedDetail
     * @param Meals                   $meals
     * @param PlaceId                 $placeId
     * @param PictureIdSet            $pictures
     */
    public function addAnAccommodation(
        AccommodationId $accommodationId,
        AccommodationTemplateId $templateId,
        LocalizedDetail $localizedDetail,
        Meals $meals,
        PlaceId $placeId,
        PictureIdSet $pictures
    ): void {
        $this->accommodation = $this->buildAccommodation(
            $accommodationId,
            $templateId,
            $localizedDetail,
            $meals,
            $placeId,
            $pictures
        );
    }

    /**
     * @param AccommodationId         $accommodationId
     * @param AccommodationTemplateId $templateId
     * @param LocalizedDetail         $localizedDetail
     * @param Meals                   $meals
     * @param PlaceId                 $placeId
     * @param PictureIdSet            $pictures
     */
    public function addAnAlternativeAccommodation(
        AccommodationId $accommodationId,
        AccommodationTemplateId $templateId,
        LocalizedDetail $localizedDetail,
        Meals $meals,
        PlaceId $placeId,
        PictureIdSet $pictures
    ): void {
        if ($this->hasAlternativeAccommodation($accommodationId)) {
            throw new LogicException("Cannot add alternative Accommodation $accommodationId because it does exist on Step $this->id");
        }

        $this->alternativeAccommodations[$accommodationId->toString()] = $this->buildAccommodation(
            $accommodationId,
            $templateId,
            $localizedDetail,
            $meals,
            $placeId,
            $pictures
        );
    }

    public function removeAccommodation(): void
    {
        if (!$this->hasAccommodation()) {
            throw new LogicException("Cannot remove Accommodation because it does not exist on Step $this->id");
        }

        $this->accommodation = null;
    }

    /**
     * @param AccommodationId $accommodationId
     */
    public function removeAnAlternativeAccommodation(AccommodationId $accommodationId): void
    {
        if (!$this->hasAlternativeAccommodation($accommodationId)) {
            throw new LogicException("Cannot remove alternative Accommodation $accommodationId because it does not exist on Step $this->id");
        }

        unset($this->alternativeAccommodations[$accommodationId->toString()]);
    }

    /**
     * @return bool
     */
    private function hasAccommodation(): bool
    {
        return null !== $this->accommodation;
    }

    /**
     * @param AccommodationId $accommodationId
     *
     * @return bool
     */
    private function hasAlternativeAccommodation(AccommodationId $accommodationId): bool
    {
        return isset($this->alternativeAccommodations[$accommodationId->toString()]);
    }
}
