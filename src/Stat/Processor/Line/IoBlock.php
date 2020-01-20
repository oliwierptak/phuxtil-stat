<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

class IoBlock extends AbstractLineProcessor
{
    const TYPE = 'ioblock';

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
        \preg_match('/([0-9]+)IOBlock:([0-9]+)/', $value, $matches);

        return (int)$matches[2];
    }
}
