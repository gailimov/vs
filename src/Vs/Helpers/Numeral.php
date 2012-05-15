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
     * Returns variant with proper ending depending on amount
     *
     * Usage example:
     *
     *     // Displays "22 комментария"
     *     echo '22 ' . Numeral::choosePlural(22, array('комментарий', 'комментария', 'комментариев'));
     *
     * @param  int   $amount   Amount of items
     * @param  array $variants Variants (forms) of items
     * @return string
     */
    public static function choosePlural($amount, array $variants)
    {
        $num10 = $amount % 10;
        $num100 = $amount % 100;

        if ($num10 == 1 && $num100 != 11)
            return $variants[0];
        elseif ($num10 >= 2 && $num10 <= 4 && ($num100 < 10 || $num100 >= 20))
            return $variants[1];
        return $variants[2];
    }

    /**
     * Returns variant with proper ending and amount depending on amount.
     * You also can set variant for absence (zero) amount.
     *
     * Usage example:
     *
     *     // Displays "0 комментариев"
     *     echo Numeral::getPlural(0, array('комментарий', 'комментария', 'комментариев'));
     *     // Displayes "нет комментариев"
     *     echo Numeral::getPlural(0, array('комментарий', 'комментария', 'комментариев'), 'нет комментариев');
     *
     * @param  int    $amount   Amount of items
     * @param  array  $variants Variants (forms) of items
     * @param  string $absence  Variant for absence amount (zero)
     * @return string
     */
    public static function getPlural($amount, array $variants, $absence = null)
    {
        return ($amount || !$absence) ? sprintf('%d %s', $amount, self::choosePlural($amount, $variants)) : $absence;
    }
}
