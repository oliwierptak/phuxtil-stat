<?php

namespace Phuxtil\Stat\Processor\Line;

class Uid extends AbstractLineProcessor
{
    const TYPE = 'uid';

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

        $matches = [];
        \preg_match('/Uid:\(([0-9]+)\/([a-zA-Z0-9]+)\)/', $value, $matches);

        return (int)$matches[1];
    }

}
