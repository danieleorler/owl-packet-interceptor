<?php

namespace OWLPacketInterceptor\Parser\SpecificParser;

use Dalen\OWLPacketInterceptor\Parser\SpecificParser\SolarXMLParser;
use Dalen\OWLPacketInterceptor\Packet\Solar\Solar;

/**
 * Description of SolarXMLParserTest
 *
 * @author danieleorler
 */
class SolarXMLParserTest extends \PHPUnit_Framework_TestCase
{
    private $data;
    
    public function __construct()
    {
        $this->data = file_get_contents("./tests/data/solar_sample_packet.xml");
    }
    
    public function testParse()
    {
        $parser = new SolarXMLParser();
        $parser->setXMLElement(new \SimpleXMLElement($this->data));
        
        $expected = array
        (
            'id'        => '00A0C914C851',
            'day'       => array
            (
                'generating'    => array('units' => 'wh','value' => 0.00,),
                'exporting'     => array('units' => 'wh','value' => 0.00,),
            ),
            'current'   => array
            (
                'generating'    => array('units' => 'w','value' => 0.00,),
                'exporting'     => array('units' => 'w','value' => 0.00,),
            ),
        );

        $this->assertEquals(new Solar($expected),$parser->parse());
    }
}
