<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

class Gid extends AbstractLineProcessor
{
    const TYPE = 'gid';

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
        \preg_match('/Gid:\(([0-9]+)\/([^)]+)\)/', $value, $matches);

        return (int)$matches[1];
    }
}
