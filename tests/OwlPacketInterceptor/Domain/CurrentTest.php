<?php

namespace OWLPacketInterceptor\Domain;

use Dalen\OWLPacketInterceptor\Domain\Current;

/**
 * Description of DayTest
 *
 * @author danieleorler
 */
class CurrentTest extends \PHPUnit_Framework_TestCase
{
    private $data;
    
    public function __construct()
    {
        $this->data = array('units' => 'w', 'value' => '1288.00');
    }

    public function testContructFromData()
    {
        $object = new Current($this->data);
        
        $this->assertEquals('w', $object->units);
        $this->assertEquals('1288.00', $object->value);
    }
    
    public function testGetJson()
    {
        $object = new Current($this->data);
        $this->assertEquals('{"units":"w","value":"1288.00"}',json_encode($object));
    }
}
