<?php

namespace OWLPacketInterceptor\Packet\Solar;

use Dalen\OWLPacketInterceptor\Packet\Solar\Exporting;

/**
 * Description of Exporting
 *
 * @author danieleorler
 */
class ExportingTest extends \PHPUnit_Framework_TestCase
{
    private $data;
    
    public function __construct()
    {
        $this->data = array('units' => 'w', 'value' => '0.00');
    }

    public function testContructFromData()
    {
        $object = new Exporting($this->data);
        
        $this->assertEquals('w', $object->units);
        $this->assertEquals('0.00', $object->value);
    }

    public function testGetJson()
    {
        $object = new Exporting($this->data);
        $this->assertEquals('{"units":"w","value":"0.00"}',json_encode($object));
    }
}
