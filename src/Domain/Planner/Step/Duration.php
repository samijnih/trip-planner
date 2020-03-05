<?php

declare(strict_types=1);

namespace Domain\Planner\Step;

final class Duration
{
    /**
     * @var int
     */
    private $value;

    /**
     * Constructor.
     *
     * @param int $value
     */
    private function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @param  int $value
     *
     * @return Duration
     */
    public static function fromValue(int $value): Duration
    {
        if (!($value >= 0)) {
            throw new \RangeException('Cannot create class Duration with a value not greater or equal than 0.');
        }

        return new self($value);
    }
}