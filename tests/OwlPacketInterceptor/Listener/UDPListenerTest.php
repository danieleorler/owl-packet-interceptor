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
        $this->data = file_get_contents("./tests/data/electricity_sample_packet.xml");
    }
    
    public function testCreateListener()
    {
        $listener = new UDPListener("127.0.0.1",8000);
        
        $status = socket_get_status($listener->getSocket());
        $listener->close();
        $this->assertEquals("udp_socket",$status["stream_type"]);
    }
    
    public function testRead()
    {
        $listener = new UDPListener("127.0.0.1",8000);
        exec('echo -n "testing UDPListener" | nc -4u -q1 127.0.0.1 8000 > /dev/null 2>/dev/null &');
        $data = $listener->read();
        $listener->close();
        $this->assertEquals("testing UDPListener",$data);
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testClose()
    {
        $listener = new UDPListener("127.0.0.1",8000);
        $listener->close();
        socket_get_status($listener->getSocket());
    }
}
