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
 * Helper for working with dates
 *
 * @author Kanat Gailimov <gailimov@gmail.com>
 */
class Date
{
    /**
     * Formats date
     *
     * Usage example:
     *
     *     // Displays "14 мая 2012 г. в 20:23"
     *     echo Date::format('2012-05-14 20:23:00');
     *     // Displays "14 мая 2012 г."
     *     echo Date::format('2012-05-14 20:23:00', false);
     *
     * @param  string $date    Date
     * @param  bool   $hasTime Use time?
     * @return string
     */
    public static function format($date, $hasTime = true)
    {
        // Getting date and time
        list($day, $time) = explode(' ', $date);

        switch($day) {
            // If date coincides with today's
            case date('Y-m-d'):
                $result = 'сегодня';
                break;
            // If date coincides with yesterday's
            case date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') - 1, date('Y'))):
                $result = 'вчера';
                break;
            default:
                // Splitting date into parts
                list($y, $m, $d) = explode('-', $day);
                $monthStr = array(
                    'января', 'февраля', 'марта',
                    'апреля', 'мая', 'июня',
                    'июля', 'августа', 'сентября',
                    'октября', 'ноября', 'декабря'
                );
                $monthInt = array(
                    '01', '02', '03',
                    '04', '05', '06',
                    '07', '08', '09',
                    '10', '11', '12'
                );
                // Replacing numerical designation of month on verbal
                $m = str_replace($monthInt, $monthStr, $m);
                // Formation of the final result
                $result = $d . ' ' . $m . ' ' . $y . ' г.';
        }

        if ($hasTime) {
            // Getting individual parts of time, except seconds
            list($h, $m, $s) = explode(':', $time);
            $result .= ' в ' . $h . ':' . $m;
        }

        return $result;
    }
}
