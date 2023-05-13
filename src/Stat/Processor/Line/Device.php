<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

class Device extends AbstractLineProcessor
{
    public const TYPE = 'device';

    protected string $pattern = 'Device:';

    protected int $position = 2;

    protected int $positionColumn = 1;

    /**
     * @return string
     */
    protected function extractValue(): mixed
    {
        return (string)parent::extractValue();
    }
}
