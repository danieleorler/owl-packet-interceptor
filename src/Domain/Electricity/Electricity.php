<?php

namespace Dalen\OWLPacketInterceptor\Domain\Electricity;

use Dalen\OWLPacketInterceptor\Domain\Base;
use Dalen\OWLPacketInterceptor\Domain\Collection;

class Electricity extends Base
{
    function __construct($data = NULL)
    {
        $this->fields = array
        (
            'id'        => '',
            'signal'    => NULL,
            'battery'   => NULL,
            'channels'  => new Collection(),
        );
        
        if(!empty($data))
        {
            parent::__construct(array('id' => $data['id']));
            
            if(is_array($data))
            {
                $this->loadFromArray($data);
            }
        }
    }
    
    /*
     * @parameter $data Array
     */
    private function loadFromArray($data)
    {
        foreach($data['chan'] AS $channel)
        {
            $this->fields['channels']->addItem(new Channel($channel));
        }

        $this->fields['signal']     =  new Signal($data['signal']);
        $this->fields['battery']    =  new Battery($data['battery']);
    }
}