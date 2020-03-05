<?php

declare(strict_types=1);

namespace Domain\Event;

use JsonSerializable;

interface PastEvent extends JsonSerializable
{
    /**
     * @return string
     */
    public function getName(): string;
}