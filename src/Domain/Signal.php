<?php

namespace Dalen\OWLPacketInterceptor\Domain;

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