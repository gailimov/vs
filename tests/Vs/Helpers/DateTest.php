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

    public function testRelative()
    {
        // Now (up to 30 sec)
        $this->assertEquals('только что', Date::relative('2012-05-16 20:52:45', '2012-05-16 20:52:45'));
        $this->assertEquals('только что', Date::relative('2012-05-16 20:52:45', '2012-05-16 20:53:14'));

        // Seconds
        $this->assertEquals('30 секунд назад', Date::relative('2012-05-16 20:52:45', '2012-05-16 20:53:15'));

        // Minutes
        $this->assertEquals('1 минуту назад', Date::relative('2012-05-16 20:52:45', '2012-05-16 20:53:45'));
        $this->assertEquals('5 минут назад', Date::relative('2012-05-16 20:52:45', '2012-05-16 20:57:45'));

        // Hours
        $this->assertEquals('1 час назад', Date::relative('2012-05-16 20:52:45', '2012-05-16 21:52:45'));
        $this->assertEquals('2 часа назад', Date::relative('2012-05-16 20:52:45', '2012-05-16 22:52:45'));

        // Days
        $this->assertEquals('1 день назад', Date::relative('2012-05-16 20:52:45', '2012-05-17 20:52:45'));

        // Weeks
        $this->assertEquals('1 неделю назад', Date::relative('2012-05-16 20:52:45', '2012-05-23 20:52:45'));

        // Months
        $this->assertEquals('1 месяц назад', Date::relative('2012-05-16 20:52:45', '2012-06-16 20:52:45'));

        // Years
        $this->assertEquals('1 год назад', Date::relative('2012-05-16 20:52:45', '2013-05-16 20:52:45'));
        $this->assertEquals('10 лет назад', Date::relative('2012-05-16 20:52:45', '2022-05-16 20:52:45'));

        // Mixed
        $this->assertEquals('1 неделю и 4 дня назад', Date::relative('2012-05-16 20:52:45', '2012-05-27 21:52:45'));
        $this->assertEquals('1 год, 1 месяц, 1 неделю, 4 дня, 1 час и 1 минуту назад',
                            Date::relative('2012-05-16 20:52:45', '2013-06-26 21:53:45', 6));
    }
}
