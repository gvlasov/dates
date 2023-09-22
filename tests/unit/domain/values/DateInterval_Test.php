<?php

namespace Tests\unit\domain\values;


use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Smartsites\Dates\domain\values\Date;
use Smartsites\Dates\domain\values\DateInterval;

class DateInterval_Test extends TestCase
{

    public function test_can_be_created_valid()
    {
        new DateInterval(
            new Date('2023-01-01'),
            new Date('2023-02-01')
        );
        $this->assertTrue(true);
    }

    public function test_cant_be_created_invalid()
    {
        $this->expectException(InvalidArgumentException::class);
        new DateInterval(
            new Date('2023-01-01'),
            new Date('2022-02-01')
        );
    }

    public function test_can_tell_if_starts_with_date()
    {
        $this->assertTrue(
            (new DateInterval(
                new Date('2020-01-01'),
                new Date('2020-01-09'),
            ))->startsWith(
                new Date('2020-01-01')
            )
        );
    }

    public function test_can_tell_if_ends_with_date()
    {
        $this->assertTrue(
            (new DateInterval(
                new Date('2020-01-01'),
                new Date('2020-01-09'),
            ))->endsWith(
                new Date('2020-01-09')
            )
        );
    }

    public function test_can_tell_if_doesn_start_with()
    {
        $this->assertFalse(
            (new DateInterval(
                new Date('2020-01-01'),
                new Date('2020-01-09'),
            ))->startsWith(
                new Date('2020-01-09')
            )
        );
    }

    public function test_can_tell_if_doesn_end_with()
    {
        $this->assertFalse(
            (new DateInterval(
                new Date('2020-01-01'),
                new Date('2020-01-09'),
            ))->endsWith(
                new Date('2020-01-01')
            )
        );
    }


}