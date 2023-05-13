<?php

declare(strict_types = 1);

namespace Phuxtil\Stat;

interface StatFacadeInterface
{
    public function process(string $input): Stat;
}
