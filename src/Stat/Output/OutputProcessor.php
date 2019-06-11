<?php

namespace Phuxtil\Stat\Output;


use Phuxtil\Stat\Processor\LineProcessorInterface;

class OutputProcessor
{
    /**
     * @var \Phuxtil\Stat\Processor\LineProcessorInterface[]
     */
    protected $processors;

    /**
     * @var \Phuxtil\Stat\Processor\LineProcessorInterface[] $processors
     */
    public function __construct(array $processors)
    {
        $this->processors = $processors;
    }

    public function process(string $input): Stat
    {
        $lines = \explode(\PHP_EOL, $input);
        $result = $this->processLines($lines);
        $output = (new Stat())->fromArray($result);

        return $output;
    }

    protected function processLines(array $lines): array
    {
        $result = [];

        for ($lineNumber = 0; $lineNumber < count($lines); $lineNumber++) {
            foreach ($this->processors as $type => $lineProcessor) {
                /**
                 * @var \Phuxtil\Stat\Processor\LineProcessorInterface $lineProcessor
                 */
                if (!$this->canRun($lineNumber, $lines[$lineNumber], $lineProcessor)) {
                    continue;
                }

                $lineProcessor->processLine($lines[$lineNumber]);
                $result[$type] = $lineProcessor->getValue();
            }
        }

        return $result;
    }

    protected function canRun(int $position, string $currentLine, LineProcessorInterface $line): bool
    {
        if ($position !== $line->getPosition()) {
            return false;
        }

        $compactedLine = preg_replace('/\s+/', '', $currentLine);
        $linePattern = \substr($compactedLine, 0, strlen($line->getPattern()));

        return $line->getPattern() === $linePattern;
    }
}
