<?php
namespace Phonetic;

/**
 * Class ColognePhonetic
 *
 * @package   Phonetic
 * @version   1.0
 * @license   GPL 3.0 <http://www.gnu.org/licenses/>
 * @copyright 2014 tobyte
 * @author    Tobias Reinwarth <mailtobyte at googlemail.com>
 */
class ColognePhonetic
{
    /**
     * A function for retrieving the Kölner Phonetik value of a string
     *
     * As described at http://de.wikipedia.org/wiki/Kölner_Phonetik
     * Based on Hans Joachim Postel: Die Kölner Phonetik.
     * Ein Verfahren zur Identifizierung von Personennamen auf der
     * Grundlage der Gestaltanalyse.
     * in: IBM-Nachrichten, 19. Jahrgang, 1969, S. 925-931
     *
     * This program is distributed in the hope that it will be useful,
     * but WITHOUT ANY WARRANTY; without even the implied warranty of
     * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     * GNU General Public License for more details.
     *
     * @version    1.0
     * @link       http://www.einfachmarke.de
     * @license    GPL 3.0 <http://www.gnu.org/licenses/>
     * @copyright  2008 by einfachmarke.de
     * @author     Nicolas Zimmer <nicolas dot zimmer at einfachmarke.de>
     */
    public static function convert($word)
    {

        /**
         * @param  string $word string to be analyzed
         *
         * @return string  $value represents the Kölner Phonetik value
         * @access public
         */

        $value = array();

        // Prepare for processing
        $word = strtolower($word);
        $substitution = array(
            'ä'  => 'a',
            'ö'  => 'o',
            'ü'  => 'u',
            'ß'  => 'ss',
            'ph' => 'f'
        );

        foreach ($substitution as $letter => $sub) {
            $word = str_replace($letter, $sub, $word);
        }

        $len = strlen($word);

        // Exceptions
        $exceptionsLeading = array(
            4 => array('ca', 'ch', 'ck', 'cl', 'co', 'cq', 'cu', 'cx'),
            8 => array('dc', 'ds', 'dz', 'tc', 'ts', 'tz')
        );

        $exceptionsFollowing = array('sc', 'zc', 'cx', 'kx', 'qx');

        // Coding Table
        $codingTable = array(
            0  => array('a', 'e', 'i', 'j', 'o', 'u', 'y'),
            1  => array('b', 'p'),
            2  => array('d', 't'),
            3  => array('f', 'v', 'w'),
            4  => array('c', 'g', 'k', 'q'),
            48 => array('x'),
            5  => array('l'),
            6  => array('m', 'n'),
            7  => array('r'),
            8  => array('c', 's', 'z'),
        );

        for ($i = 0; $i < $len; $i++) {
            $value[$i] = '';

            // Check leading exceptions if min two characters till end of word
            if ($i < $len - 1) {
                if ($i == 0 && $i < $len - 1 && $word[$i] . $word[$i + 1] == 'cr') {
                    $value[$i] = 4;
                }

                foreach ($exceptionsLeading as $code => $letters) {
                    if (in_array($word[$i] . $word[$i + 1], $letters)) {
                        $value[$i] = $code;
                    }
                }
            }

            // Check following exceptions
            if ($i != 0 && (in_array($word[$i - 1] . $word[$i], $exceptionsFollowing))) {
                $value[$i] = 8;
            }

            // Normal encoding
            if ($value[$i] == '') {
                foreach ($codingTable as $code => $letters) {
                    if (in_array($word[$i], $letters)) {
                        $value[$i] = $code;
                    }
                }
            }
        }

        // delete double values
        $valueLength = count($value);

        for ($i = 1; $i < $valueLength; $i++) {
            if ($value[$i] === $value[$i - 1]) {
                $value[$i] = '';
            }
        }

        // delete vocals
        for ($i = 1; $i < $valueLength; $i++) { // omitting first character code and h
            if ($value[$i] == 0) {
                $value[$i] = '';
            }
        }

        // filter all empty values
        $value = array_filter($value, function ($code) {
            return ($code === '') ? false : true;
        });

        $value = implode('', $value);

        return $value;
    }
}
