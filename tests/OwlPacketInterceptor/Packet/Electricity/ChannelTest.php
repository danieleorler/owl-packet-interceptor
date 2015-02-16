<?php

namespace OWLPacketInterceptor\Packet\Electricity;

use Dalen\OWLPacketInterceptor\Packet\Electricity\Channel;

/**
 * Description of DayTest
 *
 * @author danieleorler
 */
class ChannelTest extends \PHPUnit_Framework_TestCase
{
    private $data;
    
    public function __construct()
    {
        $this->data = array
        (
            'id'    => '1',
            'curr'  => array('units' => 'w', 'value' => '1288.00'),
            'day'   => array('units' => 'wh', 'value' => '9904.89'),
        );
    }
    
    public function testContructFromData()
    {
        $object = new Channel($this->data);
        
        $this->assertEquals('1', $object->id);
        $this->assertEquals('w', $object->current->units);
        $this->assertEquals('1288.00', $object->current->value);
        $this->assertEquals('wh', $object->day->units);
        $this->assertEquals('9904.89', $object->day->value);
    }
    
    public function testGetJson()
    {
        $object = new Channel($this->data);
        $this->assertEquals('{"id":"1","current":{"units":"w","value":"1288.00"},"day":{"units":"wh","value":"9904.89"}}',json_encode($object));
    }
}
