<?php

declare(strict_types=1);

namespace Domain\Text;

use Domain\Language\Language;

interface LocalizedDetail
{
    public function language(): Language;
}
