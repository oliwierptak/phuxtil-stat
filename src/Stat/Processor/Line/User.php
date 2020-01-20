<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

class User extends AbstractLineProcessor
{
    const TYPE = 'user';

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
        \preg_match('/Uid:\(([0-9]+)\/([^)]+)\)/', $value, $matches);

        return $matches[2];
    }
}
