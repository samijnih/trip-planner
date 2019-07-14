<?php

declare(strict_types=1);

namespace Domain;

use Domain\Event\PastEventCollection;

interface AggregateRoot
{
    /**
     * @return PastEventCollection
     */
    public function releaseEvents(): PastEventCollection;
}
