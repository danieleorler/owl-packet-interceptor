<?php

namespace OWLPacketInterceptor\Storage;

use Dalen\OWLPacketInterceptor\Storage\StdOutStorage;
use Dalen\OWLPacketInterceptor\Domain\Electricity\Electricity;

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
            ),
        );
    }
    
    public function testStoreElectricity()
    {
        $object = new Electricity($this->data);
        
        $storage = new StdOutStorage();
        
        ob_start();
        $storage->storeElectricity($object);
        $output = ob_get_contents();
        ob_end_clean();
        
        $this->assertEquals('{"id":"AA12345679","signal":{"rssi":"-86","lqi":"91"},"battery":{"level":"100%"},"channels":[{"id":0,"current":{"units":"w","value":"1288.00"},"day":{"units":"wh","value":"9904.89"}}]}',$output);
    }
}
