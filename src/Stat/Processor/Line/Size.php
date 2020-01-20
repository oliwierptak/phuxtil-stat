<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

class Size extends AbstractLineProcessor
{
    const TYPE = 'size';

    /**
     * @var string
     */
    protected $pattern = 'Size:';

    /**
     * @var int
     */
    protected $position = 1;

    protected function extractValue()
    {
        $value = parent::extractValue();
        $value = \preg_filter('/^([0-9]+)Blocks(.*)/', '$1', $value);

        return (int)$value;
    }
}
