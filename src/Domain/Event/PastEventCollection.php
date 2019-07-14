<?php

declare(strict_types=1);

namespace Domain\Event;

use Domain\DataStructure\TypedCollectionStructure;

final class PastEventCollection extends TypedCollectionStructure
{
    /**
     * {@inheritDoc}
     */
    protected function getType(): string
    {
        return PastEvent::class;
    }
}