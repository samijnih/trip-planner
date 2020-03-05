<?php

declare(strict_types=1);

namespace Domain\Planner\Transportation;

use RangeException;

final class Time
{
    /**
     * @var int
     */
    private $seconds;

    /**
     * Constructor.
     *
     * @param int $seconds
     */
    public function __construct(int $seconds)
    {
        $this->seconds = $seconds;
    }

    /**
     * @param  int $hour
     * @param  int $minute
     *
     * @return Time
     */
    public static function createFromHourMinute(int $hour, int $minute): Time
    {
        if (!($hour >= 0)) {
            throw new RangeException('Cannot create class Time with an hour not greater or equal than 0.');
        }
        if (!($minute >= 0)) {
            throw new RangeException('Cannot create class Time with a minute not greater or equal than 0.');
        }

        return new self($hour * 3600 + $minute * 60);
    }

    /**
     * @return int
     */
    public function seconds(): int
    {
        return $this->seconds;
    }
}
