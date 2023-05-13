<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

use Phuxtil\Stat\DefinesInterface;

class Type extends AbstractLineProcessor
{
    public const TYPE = 'type';

    protected string $pattern = 'Size:';

    protected int $position = 1;

    protected int $positionColumn = 7;

    /**
     * @return string
     */
    protected function extractValue(): mixed
    {
        $tokens = $this->extractLineTokens();
        $value = trim((string) array_pop($tokens));
        $valueSecondary = trim((string) array_pop($tokens));
        $valueSecondary = preg_replace('([0-9]+)', '', $valueSecondary);

        $value = $valueSecondary.$value;

        if (!isset(DefinesInterface::STAT_TYPES[$value])) {
            throw new \InvalidArgumentException('Unknown file type: ' . $value);
        }

        return DefinesInterface::STAT_TYPES[$value];
    }
}
