<?php

namespace Dalen\OWLPacketInterceptor\Domain\Electricity;

use Dalen\OWLPacketInterceptor\Domain\Base;

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