<?php

class Listener
{
    private $socket;

    public function __construct($port)
    {
        $this->socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        socket_bind($this->socket, '0.0.0.0', $port);
    }

    public function read()
    {
        $from = '';
        $port = 0;
        socket_recvfrom($this->socket, $buf, 65535, 0, $from, $port);

        return $buf;
    }
}