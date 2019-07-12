<?php

declare(strict_types=1);

namespace Domain\Planner;

use Domain\Request\RequestId;

final class Trip
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $requestId;

    /**
     * @var string
     */
    private $title;

    /**
     * Constructor.
     *
     * @param TripId    $id
     * @param RequestId $requestId
     * @param Title     $title
     */
    private function __construct(TripId $id, RequestId $requestId, Title $title)
    {
        $this->id = $id->toString();
        $this->requestId = $requestId->toString();
        $this->title = $title->value();
    }

    /**
     * @param  TripId    $id
     * @param  RequestId $requestId
     * @param  Title     $title
     *
     * @return Trip
     */
    public static function createForRequest(TripId $id, RequestId $requestId, Title $title): Trip
    {
        return new self($id, $requestId, $title);
    }
}
