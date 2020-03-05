<?php

declare(strict_types=1);

namespace Domain\Planner;

use Domain\Agency\AgencyId;
use Domain\AggregateRoot;
use Domain\Event\PastEventCollection;
use Domain\PastEventGenerator;
use Domain\Request\RequestId;
use Domain\Service\Clock;
use Domain\Service\ImmutableDateTimeClock;
use Domain\Text\Title;

final class Trip implements AggregateRoot
{
    private const MIN_STEP_PLACE_COUNT = 1;
    private const MAX_STEP_PLACE_COUNT = 5;

    use PastEventGenerator, ItineraryBuilder;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $requestId;

    /**
     * @var AgencyId
     */
    private $agencyId;

    /**
     * @var string
     */
    private $title;

    /**
     * @var Clock
     */
    private $clock;

    /**
     * Constructor.
     *
     * @param TripId    $id
     * @param RequestId $requestId
     * @param AgencyId  $agencyId
     * @param Title     $title
     * @param Clock     $clock
     */
    private function __construct(
        TripId $id,
        RequestId $requestId,
        AgencyId $agencyId,
        Title $title,
        Clock $clock
    ) {
        $this->id = $id->toString();
        $this->requestId = $requestId->toString();
        $this->agencyId = $agencyId;
        $this->title = $title->value();
        $this->clock = $clock;

        $this->steps = [];

        $this->events = PastEventCollection::create([]);
    }

    /**
     * @param  TripId    $id
     * @param  RequestId $requestId
     * @param  AgencyId  $agencyId
     * @param  Title     $title
     * @param  Clock     $clock
     *
     * @return Trip
     */
    public static function createForRequest(
        TripId $id,
        RequestId $requestId,
        AgencyId $agencyId,
        Title $title,
        Clock $clock
    ): Trip {
        $trip = new self($id, $requestId, $agencyId, $title, $clock);
        $trip->addEvent(new TripCreatedForRequest(
            $id,
            $requestId,
            $agencyId,
            $trip->clock->now()
        ));

        return $trip;
    }
}
