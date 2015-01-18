<?php

namespace Dalen\OWLPacketInterceptor\Domain;

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

            foreach($data['chan'] AS $channel)
            {
                $this->fields['channels']->addItem(new Channel($channel));
            }

            $this->fields['signal']     =  new Signal($data['signal']);
            $this->fields['battery']    =  new Battery($data['battery']);
        }
    }
}