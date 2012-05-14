<?php

require_once __DIR__ . '/../../../src/Vs/Helpers/Numeral.php';

use Vs\Helpers\Numeral;

class NumeralTest extends PHPUnit_Framework_TestCase
{
    public function testPluralize()
    {
        $variants = array('комментарий', 'комментария', 'комментариев');

        $this->assertEquals('комментарий', Numeral::pluralize(2351, $variants));
        $this->assertEquals('комментария', Numeral::pluralize(923, $variants));
        $this->assertEquals('комментариев', Numeral::pluralize(0, $variants));
        $this->assertEquals('комментариев', Numeral::pluralize(5, $variants));
        $this->assertEquals('комментариев', Numeral::pluralize(11, $variants));
    }
}
