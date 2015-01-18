<?php

namespace OWLPacketInterceptor\Domain;

use Dalen\OWLPacketInterceptor\Domain\Battery;

/**
 * Description of DayTest
 *
 * @author danieleorler
 */
class BatteryTest extends \PHPUnit_Framework_TestCase
{
    private $data;
    
    public function __construct()
    {
        $this->data = array('level' => '100%');
    }
    
    public function testContructFromData()
    {
        $object = new Battery($this->data);
        
        $this->assertEquals('100%', $object->level);
    }
    
    public function testGetJson()
    {
        $object = new Battery($this->data);
        $this->assertEquals('{"level":"100%"}',json_encode($object));
    }
}
