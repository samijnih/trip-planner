<?php

declare(strict_types=1);

use Domain\Planner\Title;
use Domain\Planner\Trip;
use Domain\Planner\TripUuid;
use Domain\Request\RequestUuid;
use Ramsey\Uuid\UuidFactory;

require_once __DIR__.'/../vendor/autoload.php';

$uuidFactory = new UuidFactory();

$requestId = new RequestUuid($uuidFactory->uuid4());
$tripId = new TripUuid($uuidFactory->uuid4());
$tripTitle = Title::fromValue('Super voyage pour Sami Jnih');

$trip = Trip::createForRequest($tripId, $requestId, $tripTitle);

var_dump($trip);
