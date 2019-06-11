<?php

namespace Phuxtil\Stat\Processor\Line;

class Blocks extends AbstractLineProcessor
{
    const TYPE = 'blocks';

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

        $matches = [];
        \preg_match('/([0-9]+)Blocks:([0-9]+)/', $value, $matches);

        return $matches[2];
    }
}
