<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

use Phuxtil\Stat\DefinesInterface;

class Type extends AbstractLineProcessor
{
    const TYPE = 'type';

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
        $statTypes = DefinesInterface::STAT_TYPES;

        $matches = [];
        \preg_match('/^([0-9]+)Blocks:([0-9]+)IOBlock:([0-9]+)(.*)$/', $value, $matches);
        $value = $matches[4];

        if (!isset($statTypes[$value])) {
            throw new \InvalidArgumentException('Unknown file type: ' . $value);
        }

        return $statTypes[$value];
    }
}
