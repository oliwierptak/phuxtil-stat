<?php

namespace Phuxtil\Stat\Processor\Line;

class Inode extends AbstractLineProcessor
{
    const TYPE = 'inode';

    /**
     * @var string
     */
    protected $pattern = 'Device:';

    /**
     * @var int
     */
    protected $position = 2;

    protected function extractValue()
    {
        $value = parent::extractValue();

        $matches = [];
        \preg_match('/Inode:([0-9]+)([^0-9]+)/', $value, $matches);

        return (int)$matches[1];
    }
}
