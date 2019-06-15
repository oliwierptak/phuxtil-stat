<?php

namespace Phuxtil\Stat;

use Phuxtil\Stat\Output\Stat;

interface StatFacadeInterface
{
    public function process(string $input): Stat;

    public function setFactory(StatFactory $factory);
}
