<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor;

interface LineProcessorInterface
{
    public function getPattern(): string;

    public function getPosition(): int;

    public function getLine(): string;

    /**
     * @return mixed
     */
    public function getValue();

    public function processLine(string $line);
}
