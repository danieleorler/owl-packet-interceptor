<?php

namespace Dalen\OWLPacketInterceptor\Domain\Electricity;

use Dalen\OWLPacketInterceptor\Domain\Base;

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