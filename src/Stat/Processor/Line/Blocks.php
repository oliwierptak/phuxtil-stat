<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

class Blocks extends AbstractLineProcessor
{
    public const TYPE = 'blocks';

    protected string $pattern = 'Size:';

    protected int $position = 1;

    protected int $positionColumn = 3;

    /**
     * @return int
     */
    protected function extractValue(): mixed
    {
        return (int)parent::extractValue();
    }

}
