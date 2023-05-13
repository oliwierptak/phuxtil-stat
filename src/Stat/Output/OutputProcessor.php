<?php

namespace Phuxtil\Stat\Output;


use Phuxtil\Stat\Processor\LineProcessorInterface;
use Phuxtil\Stat\Stat;

class OutputProcessor
{
    /**
     * @var \Phuxtil\Stat\Processor\LineProcessorInterface[] $processors
     */
    public function __construct(protected array $processors)
    {
    }

    public function process(string $input): Stat
    {
        $lines = explode(PHP_EOL, $input);
        $result = $this->processLines($lines);

        return (new Stat())
            ->fromArray($result);
    }

    protected function processLines(array $lines): array
    {
        $result = [];

        foreach ($lines as $lineNumber => $lineNumberValue) {
            foreach ($this->processors as $type => $lineProcessor) {
                /**
                 * @var \Phuxtil\Stat\Processor\LineProcessorInterface $lineProcessor
                 */
                if (!$this->canRun($lineNumber, $lineProcessor)) {
                    continue;
                }

                $lineProcessor->processLine($lineNumberValue, $lineNumber);
                $result[$type] = $lineProcessor->getValue();
            }
        }

        return $result;
    }

    protected function canRun(int $lineNumber, LineProcessorInterface $line): bool
    {
        return $lineNumber === $line->getPosition();
    }
}
