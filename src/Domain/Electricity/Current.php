<?php

namespace Dalen\OWLPacketInterceptor\Domain\Electricity;

use Dalen\OWLPacketInterceptor\Domain\Base;

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