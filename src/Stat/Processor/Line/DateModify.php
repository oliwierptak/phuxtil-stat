<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

class DateModify extends DateAccess
{
    public const TYPE = 'filemtime';

    protected string $pattern = 'Modify:';

    protected int $position = 5;
}
