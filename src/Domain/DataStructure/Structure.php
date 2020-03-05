<?php

declare(strict_types=1);

namespace Domain\DataStructure;

use Countable;
use IteratorAggregate;

interface Structure extends Countable, IteratorAggregate
{
    /**
     * @param  int $a
     * @param  int $b
     *
     * @return bool
     */
    public function hasCountBetween(int $a, int $b): bool;
}
