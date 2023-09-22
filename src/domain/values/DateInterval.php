<?php

namespace Smartsites\Dates\domain\values;

use InvalidArgumentException;

class DateInterval
{

    public function __construct(
        public Date $start,
        public Date $end
    )
    {
        if ($this->end->ymd < $this->start->ymd) {
            throw new InvalidArgumentException(
                "Date interval " . $this->start->ymd . " -- " . $this->end->ymd . " must go from earlier to later date"
            );
        }
    }

    public function startsWith(Date $date): bool {
        return $this->start->ymd === $date->ymd;
    }

    public function endsWith(Date $date): bool {
        return $this->end->ymd === $date->ymd;
    }

}