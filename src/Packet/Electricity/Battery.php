<?php

namespace Dalen\OWLPacketInterceptor\Packet\Electricity;

use Dalen\OWLPacketInterceptor\Packet\Base;

class Battery extends Base
{
    function __construct($data = NULL)
    {
        $this->fields = array
        (
            'level'  => '',
        );
        
        parent::__construct($data);
    }
}