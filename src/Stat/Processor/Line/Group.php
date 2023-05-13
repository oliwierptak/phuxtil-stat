<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

class Group extends AbstractLineProcessor
{
    public const TYPE = 'group';

    protected string $pattern = 'Access:';

    protected int $position = 3;

    protected int $positionColumn = 9;

    /**
     * @return string
     */
    protected function extractValue(): mixed
    {
        $value = parent::extractValue();

        $value = preg_replace('/([)])/i', '', $value);

        return (string)$value;
    }
}
