<?php

namespace OWLPacketInterceptor\Parser;

use Dalen\OWLPacketInterceptor\Parser\Parser;
use Dalen\OWLPacketInterceptor\Packet\Electricity\Electricity;
use Dalen\OWLPacketInterceptor\Packet\Solar\Solar;

/**
 * Description of ParserTest
 *
 * @author danieleorler
 */
class ParserTest extends \PHPUnit_Framework_TestCase
{
    private $data;
    
    public function __construct()
    {
        $this->data['electricity'] = file_get_contents("./tests/data/electricity_sample_packet.xml");
        $this->data['solar'] = file_get_contents("./tests/data/solar_sample_packet.xml");
    }
    
    public function testParseElectricity()
    {
        $parser = new Parser();
        $parser->setXMLString($this->data['electricity']);
        
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
    
    public function testParseSolar()
    {
        $parser = new Parser();
        $parser->setXMLString($this->data['solar']);
        
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
