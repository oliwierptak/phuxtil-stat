<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

class Device extends AbstractLineProcessor
{
    const TYPE = 'device';

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
        \preg_match('/(.*\/.*)Inode:(.*)/', $value, $matches);

        return $matches[1];
    }
}
