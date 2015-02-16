<?php

namespace Dalen\OWLPacketInterceptor\Packet\Electricity;

use Dalen\OWLPacketInterceptor\Packet\Base;
use Dalen\OWLPacketInterceptor\Packet\IPacket;
use Dalen\OWLPacketInterceptor\Packet\Collection;

class Electricity extends Base implements IPacket
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
    
    /*
     * returns the Domain's type
     */
    function getType()
    {
        return get_class();
    }

    /*
     * returns the object id
     */
    public function getId()
    {
        return $this->id;
    }

    /*
     * returns the Json representation of the object
     */
    public function toJson()
    {
        return json_encode($this);
    }

}