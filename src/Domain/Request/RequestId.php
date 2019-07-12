<?php

declare(strict_types=1);

namespace Domain\Request;

use Ramsey\Uuid\UuidInterface;

interface RequestId
{
    /**
     * @param  UuidInterface $uuid
     *
     * @return RequestId
     */
    public function fromUuid(UuidInterface $uuid): RequestId;

    /**
     * @return string
     */
    public function toString(): string;
}
