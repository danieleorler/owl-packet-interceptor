<?php

namespace Dalen\OWLPacketInterceptor\Parser\SpecificParser;

use Dalen\OWLPacketInterceptor\Parser\IParser;
use Dalen\OWLPacketInterceptor\Packet\Electricity\Electricity;

/**
 * Description of ElectricityXMLParser
 *
 * @author danieleorler
 */
class ElectricityXMLParser implements IParser
{
    private $xmlElement;
    
    /*
     * sets the XMLElement containing packet's data
     * @parameter \SimpleXMLElement $xmlElement
     */
    public function setXMLElement(\SimpleXMLElement $xmlElement)
    {
        $this->xmlElement = $xmlElement;
    }
    
    /*
     * returns the Electricity implementation of IPacket
     */
    public function parse()
    {
        $data            = array();
        $data['id']      = (string)$this->xmlElement->attributes()['id'];
        $data['chan']    = array();

        foreach($this->xmlElement->signal->attributes() AS $k => $v)
        {
            $data['signal'][$k] = (string)$v;
        }
        
        foreach($this->xmlElement->battery->attributes() AS $k => $v)
        {
            $data['battery'][$k] = (string)$v;
        }
        
        foreach($this->xmlElement->chan AS $chan)
        {
            $channel                    = array();
            $channel['id']              = (int)$chan->attributes()['id'];
            $channel['curr']['units']   = (string)$chan->curr->attributes()['units'];
            $channel['curr']['value']   = (float)$chan->curr;
            $channel['day']['units']    = (string)$chan->day->attributes()['units'];
            $channel['day']['value']    = (float)$chan->day;
            
            $data['chan'][]      = $channel;
        }
        
        return new Electricity($data);
    }
}
