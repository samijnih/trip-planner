<?php

declare(strict_types=1);

namespace Domain\Picture;

use Domain\DataStructure\TypedSetStructure;

final class PictureIdSet extends TypedSetStructure
{
    /**
     * @return string
     */
    protected function getType(): string
    {
        return PictureId::class;
    }
}