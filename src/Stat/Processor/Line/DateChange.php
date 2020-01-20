<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

class DateChange extends DateAccess
{
    const TYPE = 'filectime';

    /**
     * @var string
     */
    protected $pattern = 'Change:';

    /**
     * @var int
     */
    protected $position = 6;
}
