<?php
namespace PhoneticTest\ColognePhonetic;

use Phonetic\ColognePhonetic;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Class ColognePhoneticTest
 *
 * @version   1.0
 * @license   GPL 3.0 <http://www.gnu.org/licenses/>
 * @copyright 2014 tobyte
 * @author    Tobias Reinwarth <mailtobyte at googlemail.com>
 */
class ColognePhoneticTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @covers \Phonetic\ColognePhonetic::convert
     */
    public function testConvert($word, $expectedCode)
    {
        $this->assertEquals($expectedCode, ColognePhonetic::convert($word));
    }

    public function dataProvider()
    {
        return array(
            array('Waschmaschine', '38686'),
            array('ipad', '012'),
            array('hans', '068'),
            array('franz', '3768'),
            array('Dresden', '27826'),
            array('Dresdne', '27826'),
            array('piad', '12'),
            array('piod', '12'),
            array('foo bar', '317'),
            array('foo baz', '318'),
            array('foo', '3'),
            array('crow', '473')
        );
    }
}
