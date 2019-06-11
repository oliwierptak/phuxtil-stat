<?php

namespace Phuxtil\Stat;

use Phuxtil\Stat\Output\Stat;

class StatFacade
{
    /**
     * @var \Phuxtil\Stat\StatFactory
     */
    protected $factory;

    public function process(string $input): Stat
    {
        return $this->getFactory()
            ->createOutputProcessor()
            ->process($input);
    }

    public function setFactory(StatFactory $factory)
    {
        $this->factory = $factory;
    }

    protected function getFactory(): StatFactory
    {
        if ($this->factory === null) {
            $this->factory = new StatFactory();
        }

        return $this->factory;
    }
}
