<?php

namespace Dalen\OWLPacketInterceptor\Packet\Solar;

use Dalen\OWLPacketInterceptor\Packet\Base;

/**
 * Description of Generating
 *
 * @author danieleorler
 */
class Generating extends Base
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
