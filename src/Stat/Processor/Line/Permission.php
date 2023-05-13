<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

class Permission extends AbstractLineProcessor
{
    public const TYPE = 'permission';

    protected string $pattern = 'Access:';

    protected int $position = 3;

    protected int $positionColumn = 1;

    /**
     * @return string
     */
    protected function extractValue(): mixed
    {
        $value = parent::extractValue();

        $value = preg_replace('([^0-9]+)', '', $value);

        return (string)$value;
    }
}
