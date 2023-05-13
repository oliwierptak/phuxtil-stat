<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

class Inode extends AbstractLineProcessor
{
    public const TYPE = 'inode';

    protected string $pattern = 'Device:';

    protected int $position = 2;

    protected int $positionColumn = 3;

    /**
     * @return int
     */
    protected function extractValue(): mixed
    {
        return (int)parent::extractValue();
    }
}
