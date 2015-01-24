<?php

namespace Dalen\OWLPacketInterceptor\Listener;

/**
 * Description of UDPListener
 *
 * @author danieleorler
 */
class UDPListener
{
    private $socket;

    public function __construct($ip, $port)
    {
        $this->socket = stream_socket_server(sprintf("udp://%s:%d",$ip,$port), $errno, $errorMessage, STREAM_SERVER_BIND);

        if ($this->socket === FALSE)
        {
            throw new \UnexpectedValueException("Could not bind to socket: $errorMessage");
        }
    }

    public function read()
    {
        return stream_socket_recvfrom($this->socket, 65535);
    }
    
    public function close()
    {
        fclose($this->socket);
    }
    
    public function getSocket()
    {
        return $this->socket;
    }
}
