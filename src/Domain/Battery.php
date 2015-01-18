<?php

namespace Dalen\OWLPacketInterceptor\Domain;

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