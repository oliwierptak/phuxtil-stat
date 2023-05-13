<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

class IoBlock extends AbstractLineProcessor
{
    public const TYPE = 'ioblock';

    protected string $pattern = 'Size:';

    protected int $position = 1;

    protected int $positionColumn = 6;

    /**
     * @return int
     */
    protected function extractValue(): mixed
    {
        return (int)parent::extractValue();
    }
}
