owl-packet-interceptor
======================
Official repo stats

[![Build Status](https://travis-ci.org/danieleorler/owl-packet-interceptor.svg?branch=master)](https://travis-ci.org/danieleorler/owl-packet-interceptor)
[![Coverage Status](https://coveralls.io/repos/danieleorler/owl-packet-interceptor/badge.svg?branch=master)](https://coveralls.io/r/danieleorler/owl-packet-interceptor?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/danieleorler/owl-packet-interceptor/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/danieleorler/owl-packet-interceptor/?branch=master)

###Description
owl-packet-interceptor is a PHP library which intercepts and parses XML packets sent via UDP by an [OWL Monitor].

At the moment owl-packet-interceptor is able to handle packets coming from these devices:
* [OWL Intuition-e]

###Structure
owl-packet-interceptor is divided in four main packages:
* **Domain:** Classes into which the packet is unmarshalled. The Domain package contains a sub-package for each kind of packet sent from OWL devices, for now only the Electricity packet type is supported.
* **Listener:** Contains the UDP Listener which intercepts packets sent from the device.
* **Parser:** Contains the classes which are used to extract data from the XML packet.
* **Storage:** Contains the classes which handle the Domain representation of the packet.

So:
* the **Listener** intercepts a new packet,
* the **Parser** extract data from the packet,
* a new **Domain object** is built with those data,
* the Domain object in handled by the **Storage**


###Example
```php
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
    $storage->storeElectricity(new Electricity($parser->parse()));
}
```

[OWL Monitor]:http://www.theowl.com/
[OWL Intuition-e]:http://www.theowl.com/index.php/energy-monitors/remote-monitoring/intuition-e/
