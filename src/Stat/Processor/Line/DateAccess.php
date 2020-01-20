<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor\Line;

class DateAccess extends AbstractLineProcessor
{
    const TYPE = 'fileatime';

    /**
     * @var string
     */
    protected $pattern = 'Access:';

    /**
     * @var int
     */
    protected $position = 4;

    protected function extractValue()
    {
        $value = trim(preg_replace('/^' . $this->pattern . '/', '', $this->line));
        $value = \substr($value, 0, strlen('2019-06-07 18:13:35.0000')) . ' ' . \substr($value, -5);

        try {
            $date = new \DateTime($value);
        }
        catch (\Exception $e) {
            $date = $value;
        }

        return $date;
    }
}
