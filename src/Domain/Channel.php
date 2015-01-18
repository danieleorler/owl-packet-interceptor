<?php

namespace Dalen\OWLPacketInterceptor\Domain;

class Channel extends Base
{
    function __construct($data = NULL)
    {
        $this->fields = array
        (
            'id'        => '',
            'current'   => NULL,
            'day'       => NULL,
        );
        
        parent::__construct(array('id' => $data['id']));
        $this->fields['current'] = new Current($data['curr']);
        $this->fields['day'] = new Day($data['day']);
    }
}