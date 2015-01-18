<?php

namespace OWLPacketInterceptor\Domain;

use Dalen\OWLPacketInterceptor\Domain\Signal;

/**
 * Description of SignalTest
 *
 * @author danieleorler
 */
class SignalTest extends \PHPUnit_Framework_TestCase
{
    private $data;
    
    public function __construct()
    {
        $this->data = array('rssi' => '-86', 'lqi' => '91');
    }

    public function testContructFromData()
    {
        $object = new Signal($this->data);
        
        $this->assertEquals('-86', $object->rssi);
        $this->assertEquals('91', $object->lqi);
    }

    public function testGetJson()
    {
        $object = new Signal($this->data);
        $this->assertEquals('{"rssi":"-86","lqi":"91"}',json_encode($object));
    }
}
