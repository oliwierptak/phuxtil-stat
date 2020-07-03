<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

class File extends AbstractLineProcessor
{
    const TYPE = 'filename';

    /**
     * @var string
     */
    protected $pattern = 'File:';

    /**
     * @var int
     */
    protected $position = 0;

    /**
     * Includes fix for different stat output for older versions
     *
     * @return int|string|null
     */
    protected function extractValue()
    {
        //fix for different stat output for older versions
        $value = parent::extractValue();
        if ($value[0] === '`') {
            $value = substr($value, 1, strlen($value));
        }

        if ($value[strlen($value)-1] === "'") {
            $value = substr($value, 0, strlen($value)-1);
        }

        return $value;
    }
}
