<?php

namespace OWLPacketInterceptor\Parser\SpecificParser;

use Dalen\OWLPacketInterceptor\Parser\SpecificParser\ElectricityXMLParser;
use Dalen\OWLPacketInterceptor\Packet\Electricity\Electricity;

/**
 * Description of ElextricityXMLParserTest
 *
 * @author danieleorler
 */
class ElectricityXMLParserTest extends \PHPUnit_Framework_TestCase
{
    private $data;
    
    public function __construct()
    {
        $this->data = file_get_contents("./tests/data/electricity_sample_packet.xml");
    }
    
    public function testParse()
    {
        $parser = new ElectricityXMLParser();
        $parser->setXMLElement(new \SimpleXMLElement($this->data));
        
        $expected = array
        (
            'id'        => 'AA12345679',
            'signal'    => array('rssi' => '-86', 'lqi' => '91'),
            'battery'   => array('level' => '100%'),
            'chan'      => array
            (
                0 => array
                (
                    'id'    => 0,
                    'curr'  => array('units' => 'w', 'value' => '1288.00'),
                    'day'   => array('units' => 'wh', 'value' => '9904.89'),
                ),
                1 => array
                (
                    'id'    => 1,
                    'curr'  => array('units' => 'w', 'value' => '0.00'),
                    'day'   => array('units' => 'wh', 'value' => '0.00'),
                ),
            ),
        );
        
        $this->assertEquals(new Electricity($expected),$parser->parse());
    }
}
