<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

class Size extends AbstractLineProcessor
{
    public const TYPE = 'size';

    protected string $pattern = 'Size:';

    protected int $position = 1;

    protected int $positionColumn = 1;
}
