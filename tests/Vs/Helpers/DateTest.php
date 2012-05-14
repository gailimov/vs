<?php

require_once __DIR__ . '/../../../src/Vs/Helpers/Date.php';

use Vs\Helpers\Date;

class DateTest extends PHPUnit_Framework_TestCase
{
    public function testFormat()
    {
        $format = 'Y-m-d H:i:s';

        $this->assertEquals(
            'сегодня в 19:25',
            Date::format(date($format, mktime(19, 25, 0, date('m'), date('d'), date('Y'))))
        );
        $this->assertEquals(
            'сегодня',
            Date::format(date($format, mktime(19, 25, 0, date('m'), date('d'), date('Y'))), false)
        );
        $this->assertEquals(
            'вчера в 19:25',
            Date::format(date($format, mktime(19, 25, 0, date('m'), date('d') - 1, date('Y'))))
        );
        $this->assertEquals('12 мая 2012 г. в 19:25', Date::format('2012-05-12 19:25:00'));
    }
}
