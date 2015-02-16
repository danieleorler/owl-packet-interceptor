<?php

namespace Dalen\OWLPacketInterceptor\Packet\Electricity;

use Dalen\OWLPacketInterceptor\Packet\Base;

class Current extends Base
{
    function __construct($data = NULL)
    {
        $this->fields = array
        (
            'units' => '',
            'value' => '',
        );
        
        parent::__construct($data);
    }
}