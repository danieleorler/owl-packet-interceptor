<?php

namespace Dalen\OWLPacketInterceptor\Parser\SpecificParser;

use Dalen\OWLPacketInterceptor\Parser\IParser;
use Dalen\OWLPacketInterceptor\Packet\Solar\Solar;

/**
 * Description of SolarXMLParser
 *
 * @author danieleorler
 */
class SolarXMLParser implements IParser
{

    /*
     * sets the XMLElement containing packet's data
     * @parameter \SimpleXMLElement $xmlElement
     */
    public function setXMLElement(\SimpleXMLElement $xmlElement)
    {
        $this->xmlElement = $xmlElement;
    }
    
    /*
     * returns the Solar implementation of IPacket
     */
    public function parse()
    {
        $data            = array();
        $data['id']      = (string)$this->xmlElement->attributes()['id'];

        $data['current']['generating']['units'] = (string)$this->xmlElement->current->generating->attributes()['units'];
        $data['current']['generating']['value'] = (float)$this->xmlElement->current->generating;
        $data['current']['exporting']['units']  = (string)$this->xmlElement->current->exporting->attributes()['units'];
        $data['current']['exporting']['value']  = (float)$this->xmlElement->current->exporting;

        $data['day']['generating']['units']     = (string)$this->xmlElement->day->generated->attributes()['units'];
        $data['day']['generating']['value']     = (float)$this->xmlElement->day->generated;
        $data['day']['exporting']['units']      = (string)$this->xmlElement->day->exported->attributes()['units'];
        $data['day']['exporting']['value']      = (float)$this->xmlElement->day->exported;
        
        return new Solar($data);
    }

}
