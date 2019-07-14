<?php

declare(strict_types=1);

namespace Domain\Planner\Accommodation;

final class Meals
{
    public const BREAKFAST = 'breakfast';
    public const LUNCH = 'lunch';
    public const DINNER = 'dinner';
    public const UNKNOWN = null;

    /**
     * @var array
     */
    private $values;

    /**
     * Constructor.
     *
     * @param array $values
     */
    public function __construct(array $values)
    {
        $this->values = $values;
    }

    /**
     * @param  array $meals
     *
     * @return Meals
     */
    public static function create(array $meals): Meals
    {
        $breakfast = self::BREAKFAST;
        $lunch = self::LUNCH;
        $dinner = self::DINNER;

        if (false === self::validateMeal($breakfast, $meals)) {
            throw new \InvalidArgumentException("Cannot create class Meals because it needs $breakfast with a boolean value.");
        }
        if (false === self::validateMeal($lunch, $meals)) {
            throw new \InvalidArgumentException("Cannot create class Meals because it needs $lunch with a boolean value.");
        }
        if (false === self::validateMeal($dinner, $meals)) {
            throw new \InvalidArgumentException("Cannot create class Meals because it needs $dinner with a boolean value.");
        }

        return new self([
            $breakfast => $meals[$breakfast],
            $lunch => $meals[$lunch],
            $dinner => $meals[$dinner],
        ]);
    }

    /**
     * @param  string $mealType
     * @param  array  $meals
     *
     * @return bool
     */
    private static function validateMeal(string $mealType, array $meals): bool
    {
        return isset($meals[$mealType]) && (is_bool($meals[$mealType]) || self::UNKNOWN === $meals[$mealType]);
    }
}