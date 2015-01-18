<?php

namespace OWLPacketInterceptor\Domain;

use Dalen\OWLPacketInterceptor\Domain\Day;

/**
 * Description of DayTest
 *
 * @author danieleorler
 */
class DayTest extends \PHPUnit_Framework_TestCase
{
    private $data;
    
    public function __construct()
    {
        $this->data = array('units' => 'wh', 'value' => '9904.89');
    }

    public function testContructFromData()
    {
        $object = new Day($this->data);
        
        $this->assertEquals('wh', $object->units);
        $this->assertEquals('9904.89', $object->value);
    }

    public function testGetJson()
    {
        $object = new Day($this->data);
        $this->assertEquals('{"units":"wh","value":"9904.89"}',json_encode($object));
    }
}
