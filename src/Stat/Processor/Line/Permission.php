<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

class Permission extends AbstractLineProcessor
{
    const TYPE = 'permission';

    /**
     * @var string
     */
    protected $pattern = 'Access:';

    /**
     * @var int
     */
    protected $position = 3;

    protected function extractValue()
    {
        $value = parent::extractValue();
        $value = \preg_filter('/^\(([0-9]+)\/(.*)/', '$1', $value);

        return $value;
    }
}
