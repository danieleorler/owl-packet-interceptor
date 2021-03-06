<?php

namespace OWLPacketInterceptor\Packet\Solar;

use Dalen\OWLPacketInterceptor\Packet\Solar\Current;

/**
 * Description of CurrentTest
 *
 * @author danieleorler
 */
class CurrentTest extends \PHPUnit_Framework_TestCase
{
    private $data;
    
    public function __construct()
    {
        $this->data = array
        (
            'generating'  => array('units' => 'w', 'value' => '0.00'),
            'exporting'   => array('units' => 'w', 'value' => '0.00'),
        );
    }
    
    public function testContructFromData()
    {
        $object = new Current($this->data);
        
        $this->assertEquals('w', $object->generating->units);
        $this->assertEquals('0.00', $object->generating->value);
        $this->assertEquals('w', $object->exporting->units);
        $this->assertEquals('0.00', $object->exporting->value);
    }
    
    public function testGetJson()
    {
        $object = new Current($this->data);
        $this->assertEquals('{"generating":{"units":"w","value":"0.00"},"exporting":{"units":"w","value":"0.00"}}',json_encode($object));
    }
}
