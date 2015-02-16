<?php

namespace Dalen\OWLPacketInterceptor\Packet\Electricity;

use Dalen\OWLPacketInterceptor\Packet\Base;

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
        
        if(!empty($data))
        {
            parent::__construct(array('id' => $data['id']));
            $this->fields['current'] = new Current($data['curr']);
            $this->fields['day'] = new Day($data['day']);
        }
    }
}