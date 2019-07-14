<?php

declare(strict_types=1);

namespace Domain\Planner\Transportation;

final class Distance
{
    public const KM = 'kilometer';
    public const MI = 'mile';

    /**
     * @var string
     */
    private $unit;

    /**
     * @var int
     */
    private $distance;

    /**
     * Constructor.
     *
     * @param string $unit
     * @param int    $distance
     */
    public function __construct(string $unit, int $distance)
    {
        $this->unit = $unit;
        $this->distance = $distance;
    }

    /**
     * @param  int $distance
     *
     * @return Distance
     */
    public static function km(int $distance): Distance
    {
        return new self(self::KM, $distance);
    }

    /**
     * @param  int $distance
     *
     * @return Distance
     */
    public static function mi(int $distance): Distance
    {
        return new self(self::MI, $distance);
    }
}