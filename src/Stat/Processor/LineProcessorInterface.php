<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor;

interface LineProcessorInterface
{
    public function getPattern(): string;

    public function getPosition(): int;

    public function getPositionColumn(): int;

    public function getLine(): string;

    public function getValue(): mixed;

    public function processLine(string $line, int $lineNumber);
}
