<?php

declare(strict_types = 1);

namespace Phuxtil\Stat;

class StatFacade implements StatFacadeInterface
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
