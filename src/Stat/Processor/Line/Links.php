<?php

namespace Phuxtil\Stat\Processor\Line;

class Links extends AbstractLineProcessor
{
    const TYPE = 'links';

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
        \preg_match('/(.*)Links:([0-9]+)/', $value, $matches);

        return (int)$matches[2];
    }
}
