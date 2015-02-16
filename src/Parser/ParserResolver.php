<?php

namespace Dalen\OWLPacketInterceptor\Parser;

use Dalen\OWLPacketInterceptor\Exception\PacketFormatNotSupportedException;

/**
 * Description of ParserResolver
 *
 * @author danieleorler
 */
class ParserResolver
{
    
    private $xmlElement;
    
    public function setXMLElement(\SimpleXMLElement $xmlElement)
    {
        $this->xmlElement = $xmlElement;
    }
    
    public function getElementType()
    {
        return $this->xmlElement->getName();
    }
    
    /*
     * @returns IParser
     */
    public function getParser()
    {
        $elementType = $this->getElementType();
        
        switch($elementType)
        {
            case "electricity" :
                $parser = new \Dalen\OWLPacketInterceptor\Parser\SpecificParser\ElectricityXMLParser();
                $parser->setXMLElement($this->xmlElement);
                return $parser;
            case "solar" :
                $parser = new \Dalen\OWLPacketInterceptor\Parser\SpecificParser\SolarXMLParser();
                $parser->setXMLElement($this->xmlElement);
                return $parser;
            default :
                throw new PacketFormatNotSupportedException("packet type $elementType not supported");
        }
    }
}
