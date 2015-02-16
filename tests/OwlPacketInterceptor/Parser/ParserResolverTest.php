<?php

namespace OWLPacketInterceptor\Parser;

use Dalen\OWLPacketInterceptor\Parser\ParserResolver;

/**
 * Description of ParserResolverTest
 *
 * @author danieleorler
 */
class ParserResolverTest extends \PHPUnit_Framework_TestCase
{
    private $data;
    
    public function __construct()
    {
        $this->data['electricity'] = file_get_contents("./tests/data/electricity_sample_packet.xml");
        $this->data['solar'] = file_get_contents("./tests/data/solar_sample_packet.xml");
    }
    
    public function testGetElectricityParser()
    {
        $parserResolver = new ParserResolver();
        $parserResolver->setXMLElement(new \SimpleXMLElement($this->data['electricity']));
        
        $parser = $parserResolver->getParser();
        
        $this->assertInstanceOf('Dalen\OWLPacketInterceptor\Parser\SpecificParser\ElectricityXMLParser', $parser);
    }
    
    public function testGetSolarParser()
    {
        $parserResolver = new ParserResolver();
        $parserResolver->setXMLElement(new \SimpleXMLElement($this->data['solar']));
        
        $parser = $parserResolver->getParser();
        
        $this->assertInstanceOf('Dalen\OWLPacketInterceptor\Parser\SpecificParser\SolarXMLParser', $parser);
    }

    /**
     * @expectedException \Dalen\OWLPacketInterceptor\Exception\PacketFormatNotSupportedException
     */
    public function testPacketNotSupported()
    {
        $parserResolver = new ParserResolver();
        $parserResolver->setXMLElement(new \SimpleXMLElement('<notsupported><a></a></notsupported>'));
        
        $parser = $parserResolver->getParser();
        
        $this->assertInstanceOf('Dalen\OWLPacketInterceptor\Parser\SpecificParser\SolarXMLParser', $parser);
    }
    
}
