<?php

require_once('./vendor/autoload.php');

use Dalen\OWLPacketInterceptor\Listener\UDPListener;
use Dalen\OWLPacketInterceptor\Storage\StdOutStorage;
use Dalen\OWLPacketInterceptor\Parser\ElectricityXMLParser;
use Dalen\OWLPacketInterceptor\Domain\Electricity\Electricity;

$listener = new UDPListener('0.0.0.0',8000);
$parser = new ElectricityXMLParser();
$storage = new StdOutStorage();

while(true)
{
    $parser->setXMLString($listener->read());
    $storage->log(new Electricity($parser->parse()));
}