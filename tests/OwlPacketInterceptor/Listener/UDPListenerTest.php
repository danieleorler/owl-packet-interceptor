<?php

namespace OWLPacketInterceptor\Listener;

use Dalen\OWLPacketInterceptor\Listener\UDPListener;

/**
 * Description of UPDListenerTest
 *
 * @author danieleorler
 */
class UDPListenerTest extends \PHPUnit_Framework_TestCase
{
    private $data;
    
    public function __construct()
    {
        $this->data = file_get_contents("./tests/data/sample_packet.xml");
    }
    
    public function testCreateListener()
    {
    }
}
