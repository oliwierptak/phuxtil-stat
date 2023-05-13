<?php

declare(strict_types = 1);

namespace Phuxtil\Stat;

interface DefinesInterface
{
    // fifo, char, dir, block, link, file, socket and unknown
    public const VALUE_DIR = 'dir';
    public const VALUE_FILE = 'regularfile';
    public const VALUE_LINK = 'link';
    public const VALUE_CHAR = 'char';

    const STAT_TYPES = [
        'regularfile' => self::VALUE_FILE,
        'emptyfile' => self::VALUE_FILE,
        'directory' => self::VALUE_DIR,
        'symboliclink' => self::VALUE_LINK,
        'specialfile' => self::VALUE_CHAR,
    ];
}

