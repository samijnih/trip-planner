<?php

declare(strict_types=1);

namespace Domain\Planner\Transportation;

final class RouteType
{
    public const BICYCLE = 'bicycle';
    public const BOAT = 'boat';
    public const BUS = 'bus';
    public const CAR = 'car';
    public const MOTORCYCLE = 'motorcycle';
    public const AIRPLANE = 'airplane';
    public const SUBWAY = 'subway';
    public const TRAIN = 'train';

    /**
     * @var string
     */
    private $type;

    /**
     * Constructor.
     *
     * @param string $type
     */
    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return RouteType
     */
    public static function bicycle(): RouteType
    {
        return new self(self::BICYCLE);
    }

    /**
     * @return RouteType
     */
    public static function boat(): RouteType
    {
        return new self(self::BOAT);
    }

    /**
     * @return RouteType
     */
    public static function bus(): RouteType
    {
        return new self(self::BUS);
    }

    /**
     * @return RouteType
     */
    public static function car(): RouteType
    {
        return new self(self::CAR);
    }

    /**
     * @return RouteType
     */
    public static function motorcycle(): RouteType
    {
        return new self(self::MOTORCYCLE);
    }

    /**
     * @return RouteType
     */
    public static function airplane(): RouteType
    {
        return new self(self::AIRPLANE);
    }

    /**
     * @return RouteType
     */
    public static function subway(): RouteType
    {
        return new self(self::SUBWAY);
    }

    /**
     * @return RouteType
     */
    public static function train(): RouteType
    {
        return new self(self::TRAIN);
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->type;
    }
}
