<?php

namespace Dalen\OWLPacketInterceptor\Parser;

/**
 * Description of ElectricityXMLParser
 *
 * @author danieleorler
 */
class ElectricityXMLParser
{
    private $xmlString = '';
    
    public function setXMLString($string)
    {
        $this->xmlString = $string;
    }
    
    public function parse()
    {
        $xml = new \SimpleXMLElement($this->xmlString);
        
        $electricity['id']      = (string)$xml->attributes()['id'];
        $electricity['chan']    = [];

        foreach($xml->signal->attributes() AS $k => $v)
        {
            $electricity['signal'][$k] = (string)$v;
        }
        
        foreach($xml->battery->attributes() AS $k => $v)
        {
            $electricity['battery'][$k] = (string)$v;
        }
        
        foreach($xml->chan AS $chan)
        {
            $channel['id']              = (int)$chan->attributes()['id'];
            $channel['curr']['units']   = (string)$chan->curr->attributes()['units'];
            $channel['curr']['value']   = (float)$chan->curr;
            $channel['day']['units']    = (string)$chan->day->attributes()['units'];
            $channel['day']['value']    = (float)$chan->day;
            
            $electricity['chan'][]      = $channel;
        }
        
        return $electricity;
    }
}
