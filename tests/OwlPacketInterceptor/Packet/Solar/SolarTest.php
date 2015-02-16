<?php

namespace OWLPacketInterceptor\Packet\Solar;

use Dalen\OWLPacketInterceptor\Packet\Solar\Solar;

/**
 * Description of SolarTest
 *
 * @author danieleorler
 */
class SolarTest extends \PHPUnit_Framework_TestCase
{
    private $data;

    public function __construct()
    {
        $this->data = array
        (
            'id'        => 'AA12345679',
            'current'   => array('generating' => array('units' => 'w', 'value' => '0.00'), 'exporting' => array('units' => 'w', 'value' => '0.00')),
            'day'       => array('generating' => array('units' => 'wh', 'value' => '0.00'), 'exporting' => array('units' => 'wh', 'value' => '0.00')),
        );
    }

    public function testContructFromData()
    {
        $object = new Solar($this->data);
        
        $this->assertEquals('AA12345679', $object->id);
        $this->assertEquals('w', $object->current->generating->units);
        $this->assertEquals('0.00', $object->current->generating->value);
        $this->assertEquals('w', $object->current->exporting->units);
        $this->assertEquals('0.00', $object->current->exporting->value);
        $this->assertEquals('wh', $object->day->generating->units);
        $this->assertEquals('0.00', $object->day->generating->value);
        $this->assertEquals('wh', $object->day->exporting->units);
        $this->assertEquals('0.00', $object->day->exporting->value);
    }
    
    public function testGetType()
    {
        $object = new Solar();
        $this->assertEquals("Dalen\OWLPacketInterceptor\Packet\Solar\Solar",$object->getType());
    }
    
    public function testGetId()
    {
        $object = new Solar($this->data);
        $this->assertEquals('AA12345679',$object->getId());
    }

    public function testGetJson()
    {
        $object = new Solar($this->data);
        $this->assertEquals('{"id":"AA12345679","current":{"generating":{"units":"w","value":"0.00"},"exporting":{"units":"w","value":"0.00"}},"day":{"generating":{"units":"wh","value":"0.00"},"exporting":{"units":"wh","value":"0.00"}}}',$object->toJson());
    }
}
