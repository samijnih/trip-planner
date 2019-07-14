<?php

declare(strict_types=1);

namespace Domain\Event;

use DateTimeImmutable;

trait DescribePastEvent
{
    /**
     * @var array
     */
    private $payload = [];

    /**
     * @var DateTimeImmutable
     */
    private $occurredOn;

    /**
     * @note   To override.
     *
     * @return string
     */
    public function getName(): string
    {
        return self::class;
    }
}
