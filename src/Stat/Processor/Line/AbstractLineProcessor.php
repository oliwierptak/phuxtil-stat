<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

use Phuxtil\Stat\Processor\LineProcessorInterface;

abstract class AbstractLineProcessor implements LineProcessorInterface
{
    public const TYPE = '';

    protected string $pattern;

    protected int $position = 0;

    protected int $positionColumn = 0;

    protected string $line;

    protected mixed $value;

    public function getPattern(): string
    {
        return $this->pattern;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function getPositionColumn(): int
    {
        return $this->positionColumn;
    }

    public function getLine(): string
    {
        return $this->line;
    }

    public function getValue(): mixed
    {
        return $this->value;
    }

    public function processLine(string $line, int $lineNumber): void
    {
        $this->line = trim($line);

        $this->value = $this->extractValue();
    }

    protected function extractValue(): mixed
    {
        $tokens = $this->extractLineTokens();

        return trim($tokens[$this->positionColumn]);
    }

    protected function extractLineTokens(): array
    {
        $tokens = preg_split('/([:\s+])/', $this->line, -1, PREG_SPLIT_NO_EMPTY);

        array_walk($tokens, static function(&$item){
            $item = trim($item);
        });

        return $tokens;
    }
}
