<?php

declare(strict_types=1);

namespace Domain;

use Domain\Event\PastEvent;
use Domain\Event\PastEventCollection;

trait PastEventGenerator
{
    /**
     * @var PastEventCollection
     */
    private $events;

    /**
     * @param PastEvent $pastEvent
     */
    private function addEvent(PastEvent $pastEvent): void
    {
        $this->events->append($pastEvent);
    }

    /**
     * @return PastEventCollection
     */
    public function releaseEvents(): PastEventCollection
    {
        return $this->events;
    }
}
