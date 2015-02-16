<?php

namespace OWLPacketInterceptor\Storage;

use Dalen\OWLPacketInterceptor\Storage\StdOutStorage;
use Dalen\OWLPacketInterceptor\Packet\Electricity\Electricity;
use Dalen\OWLPacketInterceptor\Packet\Solar\Solar;

/**
 * Description of StdOutStorageTest
 *
 * @author danieleorler
 */
class StdOutStorageTest extends \PHPUnit_Framework_TestCase
{
    private $data;
    
    public function __construct()
    {
        $this->data['electricity'] = array
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
            ),
        );
        $this->data['solar'] = array
        (
            'id'        => 'AA12345679',
            'day'       => array
            (
                'generating'    => array('units' => 'wh','value' => '0.00',),
                'exporting'     => array('units' => 'wh','value' => '0.00',),
            ),
            'current'   => array
            (
                'generating'    => array('units' => 'w','value' => '0.00',),
                'exporting'     => array('units' => 'w','value' => '0.00',),
            ),
        );
    }
    
    public function testStoreElectricity()
    {
        $object = new Electricity($this->data['electricity']);
        
        $storage = new StdOutStorage();
        
        ob_start();
        $storage->storePacket($object);
        $output = ob_get_contents();
        ob_end_clean();
        
        $this->assertEquals('This is an Electricity Packet',$output);
    }

    public function testStoreSolar()
    {
        $object = new Solar($this->data['solar']);
        
        $storage = new StdOutStorage();
        
        ob_start();
        $storage->storePacket($object);
        $output = ob_get_contents();
        ob_end_clean();
        
        $this->assertEquals('This is a Solar Packet',$output);
    }
    
    public function testConnect()
    {
        $storage = new StdOutStorage();
        
        ob_start();
        $storage->connect();
        $output = ob_get_contents();
        ob_end_clean();
        
        $this->assertEquals("StdOut Storage connected!",$output);
    }

    public function testDiconnect()
    {
        $storage = new StdOutStorage();
        
        ob_start();
        $storage->disconnect();
        $output = ob_get_contents();
        ob_end_clean();
        
        $this->assertEquals("StdOut Storage disconnected!",$output);
    }
}
