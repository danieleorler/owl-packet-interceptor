<?php

namespace OWLPacketInterceptor\Domain;

use Dalen\OWLPacketInterceptor\Domain\Electricity;

/**
 * Description of DayTest
 *
 * @author danieleorler
 */
class ElectricityTest extends \PHPUnit_Framework_TestCase
{
    private $data;
    
    public function __construct()
    {
        $this->data = array
        (
            'id'        => 'AA12345679',
            'signal'    => array('rssi' => '-86', 'lqi' => '91'),
            'battery'   => array('level' => '100%'),
            'chan'      => array
            (
                0 => array
                (
                    'id'    => 0,
                    'curr'  => array('units' => 'w', 'value' => '1288.00'),
                    'day'   => array('units' => 'wh', 'value' => '9904.89'),
                ),
                1 => array
                (
                    'id'    => 1,
                    'curr'  => array('units' => 'w', 'value' => '0.00'),
                    'day'   => array('units' => 'wh', 'value' => '0.00'),
                ),
            ),
        );
    }

    public function testContructFromData()
    {
        $object = new Electricity($this->data);
        
        $this->assertEquals('AA12345679', $object->id);
        $this->assertEquals('w', $object->channels->getItem(0)->current->units);
        $this->assertEquals('1288.00', $object->channels->getItem(0)->current->value);
        $this->assertEquals('wh', $object->channels->getItem(0)->day->units);
        $this->assertEquals('9904.89', $object->channels->getItem(0)->day->value);
        $this->assertEquals(2,$object->channels->size());
    }
    
    public function testGetJson()
    {
        $object = new Electricity($this->data);
        $this->assertEquals('{"id":"AA12345679","signal":{"rssi":"-86","lqi":"91"},"battery":{"level":"100%"},"channels":[{"id":0,"current":{"units":"w","value":"1288.00"},"day":{"units":"wh","value":"9904.89"}},{"id":1,"current":{"units":"w","value":"0.00"},"day":{"units":"wh","value":"0.00"}}]}',json_encode($object));
    }
}
