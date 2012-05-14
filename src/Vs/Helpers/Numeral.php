<?php

/**
 * This file is part of the Vs package
 *
 * For the license information, please view the LICENSE file
 * that was distributed with this source code.
 *
 * @author    Kanat Gailimov <gailimov@gmail.com>
 * @copyright Copyright (c) 2012 Kanat Gailimov (http://kanat.gailimov.kz)
 * @license   http://www.opensource.org/licenses/mit-license.html MIT License
 */

namespace Vs\Helpers;

/**
 * Helper for working with numerals
 *
 * @author Kanat Gailimov <gailimov@gmail.com>
 */
class Numeral
{
    /**
     * Returns right variant of ending depending on amount
     *
     * Usage example:
     *
     *     // Displays "22 комментария"
     *     echo '22 ' . Numeral::pluralize(22, array('комментарий', 'комментария', 'комментариев'));
     *
     * @param  int   $amount   Amount of items
     * @param  array $variants Variants (forms) of items
     * @return string
     */
    public static function pluralize($amount, array $variants)
    {
        $num10 = $amount % 10;
        $num100 = $amount % 100;

        if ($num10 == 1 && $num100 != 11)
            return $variants[0];
        elseif ($num10 >= 2 && $num10 <= 4 && $num100 < 10 || $num100 >= 20)
            return $variants[1];
        else
            return $variants[2];
    }
}
