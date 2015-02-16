<?php

namespace Dalen\OWLPacketInterceptor\Packet\Solar;

use Dalen\OWLPacketInterceptor\Packet\Base;

/**
 * Description of Exporting
 *
 * @author danieleorler
 */
class Exporting extends Base
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
