<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

class Gid extends AbstractLineProcessor
{
    public const TYPE = 'gid';

    protected string $pattern = 'Access:';

    protected int $position = 3;

    protected int $positionColumn = 8;

    protected function extractValue(): mixed
    {
        $value = parent::extractValue();

        $value = preg_replace('([^0-9]+)', '', $value);

        return (int)$value;
    }
}
