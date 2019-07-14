<?php

declare(strict_types=1);

namespace Domain\Planner\Accommodation;

use Domain\Text\Text;

final class Website extends Text
{
    /**
     * @param  null|string $website
     *
     * @return static
     */
    public static function fromValue(?string $website): Text
    {
        if (false === filter_var($website, FILTER_VALIDATE_URL)) {
            throw new \UnexpectedValueException("Cannot create class Website with bad URL '$website'.");
        }

        return new static($website);
    }
}