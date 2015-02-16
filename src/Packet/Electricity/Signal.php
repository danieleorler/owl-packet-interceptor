<?php

namespace Dalen\OWLPacketInterceptor\Packet\Electricity;

use Dalen\OWLPacketInterceptor\Packet\Base;

class Signal extends Base
{
    function __construct($data = NULL)
    {
        $this->fields = array
        (
            'rssi'  => '',
            'lqi'   => '',
        );
        
        parent::__construct($data);
    }
}