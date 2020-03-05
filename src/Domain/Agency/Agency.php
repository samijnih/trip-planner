<?php

declare(strict_types=1);

namespace Domain\Agency;

final class Agency
{
    /**
     * @var AgencyId
     */
    private $id;

    /**
     * Constructor.
     *
     * @param AgencyId $id
     */
    public function __construct(AgencyId $id)
    {
        $this->id = $id;
    }

    /**
     * @return AgencyId
     */
    public function id(): AgencyId
    {
        return $this->id;
    }
}