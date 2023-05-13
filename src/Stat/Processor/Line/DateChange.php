<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

class DateChange extends DateAccess
{
    public const TYPE = 'filectime';

    protected string $pattern = 'Change:';

    protected int $position = 6;
}
