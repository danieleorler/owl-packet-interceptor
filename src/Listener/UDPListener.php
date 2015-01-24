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
        $this->socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        socket_bind($this->socket, $ip, $port);
    }

    public function read()
    {
        $from = '';
        $port = 0;
        socket_recvfrom($this->socket, $buf, 65535, 0, $from, $port);

        return array
        (
            'from' => $from,
            'data' => $buf,
        );
    }
    
    public function close()
    {
        socket_close($this->socket);
    }
    
    public function getSocket()
    {
        return $this->socket;
    }
}
