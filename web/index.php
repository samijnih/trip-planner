<?php

declare(strict_types=1);

use Domain\Agency\Agency;
use Domain\Agency\AgencyUuid;
use Domain\Language\Language;
use Domain\Library\Accommodation\AccommodationTemplateUuid;
use Domain\Library\Step\StepTemplateUuid;
use Domain\Picture\PictureIdSet;
use Domain\Place\GeonameId;
use Domain\Place\PlaceIdSet;
use Domain\Planner\Accommodation\ExtendedLocalizedDetail;
use Domain\Planner\Accommodation\Meals;
use Domain\Planner\Accommodation\Website;
use Domain\Planner\Step\Duration;
use Domain\Planner\Step\StepUuid;
use Domain\Service\ImmutableDateTimeClock;
use Domain\Text\BasicLocalizedDetail;
use Domain\Text\Description;
use Domain\Text\Title;
use Domain\Planner\Trip;
use Domain\Planner\TripUuid;
use Domain\Request\RequestUuid;
use Ramsey\Uuid\UuidFactory;

require_once __DIR__.'/../vendor/autoload.php';

$uuidFactory = new UuidFactory();

# Clock
$clock = new ImmutableDateTimeClock();

# Request
$requestId = new RequestUuid($uuidFactory->uuid4());

# Agency
$agency = new Agency(AgencyUuid::generate());

# Trip
$trip = Trip::createForRequest(
    TripUuid::fromUuid($uuidFactory->uuid4()),
    $requestId,
    $agency->id(),
    Title::fromValue('Super voyage pour Sami Jnih'),
    $clock
);

# Step One
$stepIdTemplate = StepTemplateUuid::fromUuid($uuidFactory->uuid4());
$stepIdOne = $uuidFactory->uuid4();
$stepUuidOne = StepUuid::fromUuid($stepIdOne);
$trip->addAStep(
    $stepIdOne,
    $stepIdTemplate,
    new BasicLocalizedDetail(
        Language::createFromLanguage('fr'),
        Title::fromValue('Étape une'),
        Description::fromValue(null)
    ),
    Duration::fromValue(1),
    PlaceIdSet::create([
        GeonameId::fromId('273294'),
        GeonameId::fromId('172472'),
        GeonameId::fromId('189235'),
    ]),
    PictureIdSet::create([])
);
# Step One Accommodation
$accommodationIdTemplate = AccommodationTemplateUuid::fromUuid($uuidFactory->uuid4());
$accommodationIdOfStepOne = $uuidFactory->uuid4();
$trip->addAnAccommodationToStep(
    $stepUuidOne,
    $accommodationIdOfStepOne,
    $accommodationIdTemplate,
    new ExtendedLocalizedDetail(
        Language::createFromLanguage('fr'),
        Title::fromValue('Hôtel Larivoisière'),
        Description::fromValue(null),
        Website::fromValue('https://google.com')
    ),
    Meals::create([
        'breakfast' => true,
        'lunch' => true,
        'dinner' => false,
    ]),
    GeonameId::fromId('83224'),
    PictureIdSet::create([])
);

var_dump($trip);