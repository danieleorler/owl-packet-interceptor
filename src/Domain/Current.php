<?php

namespace Dalen\OWLPacketInterceptor\Domain;

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