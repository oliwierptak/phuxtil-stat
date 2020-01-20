<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

class DateModify extends DateAccess
{
    const TYPE = 'filemtime';

    /**
     * @var string
     */
    protected $pattern = 'Modify:';

    /**
     * @var int
     */
    protected $position = 5;
}
