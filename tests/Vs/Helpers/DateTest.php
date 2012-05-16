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

    public function testDiff()
    {
        // Minutes
        $this->assertEquals('только что',      Date::diff('2012-05-15 15:08:45', '2012-05-15 15:08:45'));
        $this->assertEquals('минуту назад',    Date::diff('2012-05-15 15:08:45', '2012-05-15 15:09:45'));
        $this->assertEquals('24 минуты назад', Date::diff('2012-05-15 15:08:45', '2012-05-15 15:32:45'));
        $this->assertEquals('49 минут назад',  Date::diff('2012-05-15 15:08:45', '2012-05-15 15:57:45'));
        $this->assertEquals('через минуту',    Date::diff('2012-05-15 15:09:45', '2012-05-15 15:08:45'));

        // Hours
        $this->assertEquals('час назад',      Date::diff('2012-05-15 15:08:45', '2012-05-15 16:08:45'));
        $this->assertEquals('13 часов назад', Date::diff('2012-05-15 15:08:45', '2012-05-16 04:08:45'));
        $this->assertEquals('через час',      Date::diff('2012-05-15 16:08:45', '2012-05-15 15:08:45'));

        // Days
        $this->assertEquals('вчера',         Date::diff('2012-05-15 15:08:45', '2012-05-16 15:08:45'));
        $this->assertEquals('позавчера',     Date::diff('2012-05-15 15:08:45', '2012-05-17 15:08:45'));
        $this->assertEquals('3 дня назад',   Date::diff('2012-05-15 15:08:45', '2012-05-18 15:08:45'));
        $this->assertEquals('завтра',        Date::diff('2012-05-16 15:08:45', '2012-05-15 15:08:45'));
        $this->assertEquals('послезавтра',   Date::diff('2012-05-17 15:08:45', '2012-05-15 15:08:45'));
        $this->assertEquals('через 11 дней', Date::diff('2012-05-26 15:08:45', '2012-05-15 15:08:45'));

        // Weeks
        $this->assertEquals('неделю назад',   Date::diff('2012-05-15 15:08:45', '2012-05-22 15:08:45'));
        $this->assertEquals('2 недели назад', Date::diff('2012-05-15 15:08:45', '2012-05-29 15:08:45'));
        $this->assertEquals('через неделю',   Date::diff('2012-05-15 15:08:45', '2012-05-08 15:08:45'));

        // Months
        $this->assertEquals('месяц назад',    Date::diff('2012-05-15 15:08:45', '2012-06-14 15:08:45'));
        $this->assertEquals('через месяц',    Date::diff('2012-06-14 15:08:45', '2012-05-15 15:08:45'));
        $this->assertEquals('через 2 месяца', Date::diff('2012-07-14 15:08:45', '2012-05-15 15:08:45'));

        // Years
        $this->assertEquals('год назад',   Date::diff('2012-05-15 15:08:45', '2013-05-15 15:08:45'));
        $this->assertEquals('5 лет назад', Date::diff('2012-05-15 15:08:45', '2017-05-14 15:08:45'));
        $this->assertEquals('через год',   Date::diff('2013-05-15 15:08:45', '2012-05-15 15:08:45'));
    }
}
