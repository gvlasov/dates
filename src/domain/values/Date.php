<?php

namespace Smartsites\Dates\domain\values;

use Carbon\Carbon;
use InvalidArgumentException;

class Date
{
    public static function today(): self {
        return new Date(Carbon::now()->format('Y-m-d'));
    }

    /**
     * @param string $ymd "YYYY-MM-DD"
     */
    public function __construct(
        public string $ymd
    )
    {
        $this->validate($this->ymd);
    }

    protected function validate(string $value): void
    {
        if (Carbon::createFromFormat('Y-m-d', $value) === false) {
            throw new InvalidArgumentException(
                'Date ' . var_export($value, true) . ' must be in format YYYY-MM-DD'
            );
        }
    }

    public function subDays(int $days): Date {
        return new Date(
            Carbon::createFromFormat('Y-m-d', $this->ymd)->subDays($days)->format('Y-m-d')
        );
    }

}