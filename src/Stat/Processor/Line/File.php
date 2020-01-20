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
}
