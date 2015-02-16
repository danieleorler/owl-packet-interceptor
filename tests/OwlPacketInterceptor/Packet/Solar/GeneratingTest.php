<?php

namespace OWLPacketInterceptor\Packet\Solar;

use Dalen\OWLPacketInterceptor\Packet\Solar\Generating;

/**
 * Description of Generating
 *
 * @author danieleorler
 */
class GeneratingTest extends \PHPUnit_Framework_TestCase
{
    private $data;
    
    public function __construct()
    {
        $this->data = array('units' => 'w', 'value' => '0.00');
    }

    public function testContructFromData()
    {
        $object = new Generating($this->data);
        
        $this->assertEquals('w', $object->units);
        $this->assertEquals('0.00', $object->value);
    }

    public function testGetJson()
    {
        $object = new Generating($this->data);
        $this->assertEquals('{"units":"w","value":"0.00"}',json_encode($object));
    }
}
