<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

class File extends AbstractLineProcessor
{
    public const TYPE = 'filename';

    protected string $pattern = 'File:';

    protected int $position = 0;

    protected int $positionColumn = 1;

    /**
     * Includes fix for different stat output for older versions
     */
    protected function extractValue(): mixed
    {
        $tokens = $this->extractLineTokens();
        $value = implode(' ', $tokens);
        //fix for different stat output for older versions
        $value = trim($value);
        if ($value[0] === '`') {
            $value = substr($value, 1, strlen($value));
        }

        if ($value[strlen($value)-1] === "'") {
            $value = substr($value, 0, -1);
        }

        return $value;
    }


    protected function extractLineTokens(): array
    {
        $tokens = parent::extractLineTokens();

        array_shift($tokens);

        return $tokens;
    }
}
