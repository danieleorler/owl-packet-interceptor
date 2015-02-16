<?php

namespace Dalen\OWLPacketInterceptor\Packet\Solar;

use Dalen\OWLPacketInterceptor\Packet\Base;

/**
 * Description of Day
 *
 * @author danieleorler
 */
class Day extends Base
{
    function __construct($data = NULL)
    {
        $this->fields = array
        (
            'generating'    => NULL,
            'exporting'     => NULL,
        );
        
        if(!empty($data))
        {
            $this->fields['generating'] = new Generating($data['generating']);
            $this->fields['exporting'] = new Exporting($data['exporting']);
        }
    }
}
