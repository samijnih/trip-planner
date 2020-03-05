<?php

declare(strict_types=1);

namespace Domain\Planner;

use DateTimeImmutable;
use Domain\Agency\AgencyId;
use Domain\Event\DescribePastEvent;
use Domain\Event\PastEvent;
use Domain\Request\RequestId;

final class TripCreatedForRequest implements PastEvent
{
    use DescribePastEvent;

    /**
     * Constructor.
     *
     * @param TripId            $tripId
     * @param RequestId         $requestId
     * @param AgencyId          $agencyId
     * @param DateTimeImmutable $occurredOn
     */
    public function __construct(
        TripId $tripId,
        RequestId $requestId,
        AgencyId $agencyId,
        DateTimeImmutable $occurredOn
    ) {
        $this->payload = [
            'trip_id' => $tripId->toString(),
            'request_id' => $requestId->toString(),
            'agency_id' => $agencyId->toString(),
        ];
        $this->occurredOn = $occurredOn;
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize()
    {
        return [
            'payload' => $this->payload,
            'occurred_on' => $this->occurredOn->getTimestamp(),
        ];
    }
}