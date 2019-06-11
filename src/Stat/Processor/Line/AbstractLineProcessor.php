<?php

namespace Phuxtil\Stat\Processor\Line;

use Phuxtil\Stat\Processor\LineProcessorInterface;

abstract class AbstractLineProcessor implements LineProcessorInterface
{
    const TYPE = '';

    /**
     * @var string
     */
    protected $pattern = '';

    /**
     * @var int
     */
    protected $position = 0;

    /**
     * @var string
     */
    protected $line = '';

    /**
     * @var string
     */
    protected $value = '';

    public function getPattern(): string
    {
        return $this->pattern;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function getLine(): string
    {
        return $this->line;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    public function processLine(string $line)
    {
        $this->line = $line;

        $this->value = $this->extractValue();
    }

    /**
     * @return string|int|null
     */
    protected function extractValue()
    {
        $value = preg_replace('/\s+/', '', $this->line);
        $value = preg_replace('/^' . $this->pattern . '/', '', $value);

        return $value;
    }
}
