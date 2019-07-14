<?php

declare(strict_types=1);

namespace Domain\Place;

use Domain\DataStructure\TypedSetStructure;

final class PlaceIdSet extends TypedSetStructure
{
    /**
     * @return string
     */
    protected function getType(): string
    {
        return PlaceId::class;
    }
}