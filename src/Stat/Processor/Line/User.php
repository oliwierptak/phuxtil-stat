<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

class User extends AbstractLineProcessor
{
    public const TYPE = 'user';

    protected string $pattern = 'Access:';

    protected int $position = 3;

    protected int $positionColumn = 5;

    protected function extractValue(): mixed
    {
        $value = parent::extractValue();

        $value = preg_replace('/([)])/i', '', $value);

        return (string)$value;
    }
}
