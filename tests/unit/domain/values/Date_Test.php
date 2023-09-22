<?php

namespace Tests\unit\domain\values;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Smartsites\Dates\domain\values\Date;

class Date_Test extends TestCase
{

    public function test_fails_on_invalid_date()
    {
        $this->expectException(InvalidArgumentException::class);
        new Date('a202-01-01');
    }

    public function test_can_create_valid_date()
    {
        $ymd = '2023-01-01';
        $this->assertEquals($ymd, (new Date($ymd))->ymd);
    }

    public function test_can_subtract_days() {
        $this->assertEquals(
            '2022-12-30',
            (new Date('2023-01-02'))->subDays(3)->ymd
        );
    }

}