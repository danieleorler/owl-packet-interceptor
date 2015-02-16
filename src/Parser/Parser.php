<?php

namespace Dalen\OWLPacketInterceptor\Parser;

/**
 * Description of Parser
 *
 * @author danieleorler
 */
class Parser
{
    private $xmlString = '';
    
    public function setXMLString($string)
    {
        $this->xmlString = $string;
    }
    
    public function getXMLString()
    {
        return $this->xmlString;
    }

    /*
     * returns an implementation of IPacket
     */
    public function parse()
    {
        $parserResolver = new ParserResolver();
        $parserResolver->setXMLElement(new \SimpleXMLElement($this->xmlString));
        
        $parser = $parserResolver->getParser();
        
        return $parser->parse();
    }
}
