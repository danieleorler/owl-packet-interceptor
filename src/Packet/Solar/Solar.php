<?php

namespace Dalen\OWLPacketInterceptor\Packet\Solar;

use Dalen\OWLPacketInterceptor\Packet\Base;
use Dalen\OWLPacketInterceptor\Packet\IPacket;

/**
 * Description of Solar
 *
 * @author danieleorler
 */
class Solar extends Base implements IPacket
{

    function __construct($data = NULL)
    {
        $this->fields = array
        (
            'id'        => '',
            'current'   => NULL,
            'day'       => NULL
        );
        
        if(!empty($data))
        {
            parent::__construct(array('id' => $data['id']));
            $this->fields['current'] = new Current($data['current']);
            $this->fields['day'] = new Day($data['day']);
        }
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
