<?php

require_once __DIR__ . '/../../../src/Vs/Helpers/Numeral.php';

use Vs\Helpers\Numeral;

class NumeralTest extends PHPUnit_Framework_TestCase
{
    public function testChoosePlural()
    {
        $variants = array('комментарий', 'комментария', 'комментариев');

        $this->assertEquals('комментарий', Numeral::choosePlural(2351, $variants));
        $this->assertEquals('комментария', Numeral::choosePlural(923, $variants));
        $this->assertEquals('комментариев', Numeral::choosePlural(0, $variants));
        $this->assertEquals('комментариев', Numeral::choosePlural(5, $variants));
        $this->assertEquals('комментариев', Numeral::choosePlural(11, $variants));
    }

    public function testGetPlural()
    {
        $variants = array('комментарий', 'комментария', 'комментариев');

        $this->assertEquals('0 комментариев', Numeral::getPlural(0, $variants));
        $this->assertEquals('нет комментариев', Numeral::getPlural(0, $variants, 'нет комментариев'));
        $this->assertEquals('99 комментариев', Numeral::getPlural(99, $variants, 'нет комментариев'));
    }
}
