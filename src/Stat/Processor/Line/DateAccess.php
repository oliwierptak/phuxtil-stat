<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

class DateAccess extends AbstractLineProcessor
{
    public const TYPE = 'fileatime';

    protected string $pattern = 'Access:';

    protected int $position = 4;

    protected int $positionColumn = 1;

    /**
     * @return string|\DateTime
     */
    protected function extractValue(): mixed
    {
        $value = trim(preg_replace('@^(([^:]+):)(.*)$@i', '\\3', $this->line));
        $value = \substr($value, 0, strlen('2019-06-07 18:13:35.0000')) . ' ' . \substr($value, -5);

        try {
            $date = new \DateTime($value);
        }
        catch (\Exception) {
            $date = $value;
        }

        return $date;
    }
}
