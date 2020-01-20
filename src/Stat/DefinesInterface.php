<?php

declare(strict_types = 1);

namespace Phuxtil\Stat;

interface DefinesInterface
{
    // fifo, char, dir, block, link, file, socket and unknown
    const VALUE_DIR = 'dir';
    const VALUE_FILE = 'file';
    const VALUE_LINK = 'link';
    const VALUE_CHAR = 'char';

    const STAT_TYPES = [
        'regularfile' => self::VALUE_FILE,
        'regularemptyfile' => self::VALUE_FILE,
        'directory' => self::VALUE_DIR,
        'symboliclink' => self::VALUE_LINK,
        'characterspecialfile' => self::VALUE_CHAR,
    ];
}

