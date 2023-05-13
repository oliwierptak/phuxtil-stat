<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

class Links extends AbstractLineProcessor
{
    public const TYPE = 'links';

    protected string $pattern = 'Device:';

    protected int $position = 2;

    protected int $positionColumn = 5;

    /**
     * @return int
     */
    protected function extractValue(): mixed
    {
        return (int)parent::extractValue();
    }
}
