<?php

declare(strict_types = 1);

namespace Phuxtil\Stat;

use Phuxtil\Stat\Output\OutputProcessor;
use Phuxtil\Stat\Processor\LineProcessorContainer;

class StatFactory
{
    public function createOutputProcessor(): OutputProcessor
    {
        return new OutputProcessor(
            $this->createProcessorContainer()->createLineProcessorCollection()
        );
    }

    protected function createProcessorContainer(): LineProcessorContainer
    {
        return new LineProcessorContainer();
    }
}
