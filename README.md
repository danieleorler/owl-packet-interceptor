owl-packet-interceptor
======================
Official repo stats

[![Build Status](https://travis-ci.org/danieleorler/owl-packet-interceptor.svg?branch=master)](https://travis-ci.org/danieleorler/owl-packet-interceptor)
[![Coverage Status](https://coveralls.io/repos/danieleorler/owl-packet-interceptor/badge.svg?branch=master)](https://coveralls.io/r/danieleorler/owl-packet-interceptor?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/danieleorler/owl-packet-interceptor/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/danieleorler/owl-packet-interceptor/?branch=master)

###Description
owl-packet-interceptor is a PHP library which intercepts and parses XML packets sent via UDP by an [OWL Monitor].

To do so you first need to change the Data Push Settings on your OWL Intuition Dashboard providing IP address and port where you will install owl-packet-interceptor.

At the moment owl-packet-interceptor is able to handle packets coming from these devices:
* [OWL Intuition-e]
* [OWL Intuition-pv]

###Structure
owl-packet-interceptor is divided in four main packages:
* **Packet:** Classes into which the packet is unmarshalled. The Packet package contains a sub-package for each kind of packet sent from OWL devices, for now only the Electricity and Solar packets type are supported.
Each packet is represented by a main class (Electricity.php for electricity, Solar.php for solar) which implements the IPacket interface.
* **Listener:** Contains the UDP Listener which intercepts packets sent from the device.
* **Parser:** Contains the classes which are used to extract data from the XML packet. Each parser implements the interface IParser.
* **Storage:** Contains the classes which handle the Packet representation. Each storage class implements the IStorage interface.

So:
* the **Listener** intercepts a new packet,
* the **Parser** extract data from the packet and build a new **Packet object**,
* the Packet object in handled by the **Storage**


###Getting started

Create a new folder and move into it

Install owl-packet-interceptor

```bash
$ composer require dalen/owl-packet-interceptor:dev-master
```

Create a new php file, say App.php, and write something like:


```php
<?php

require_once('./vendor/autoload.php');

use Dalen\OWLPacketInterceptor\Listener\UDPListener;
use Dalen\OWLPacketInterceptor\Storage\StdOutStorage;
use Dalen\OWLPacketInterceptor\Parser\Parser;

// create listener on port 8000
$listener = new UDPListener('0.0.0.0',8000);
// create a new parser
$parser = new Parser();
// create standard output storage (outputs on the console) 
$storage = new StdOutStorage();

// listen for new packets
while(true)
{
    // pass the XML string to the parser
    $parser->setXMLString($listener->read());
    // make the storage handle the Packet object extracted by the parser
    $storage->storePacket($parser->parse());
}
```

Run App.php

```bash
$ php App.php
```

Open a new shell and try to send a packet

```bash
$ echo -n "<electricity id='AA12345679'><signal rssi='-86' lqi='91'/><battery level='100%'/><chan id='0'><curr units='w'>1288.00</curr><day units='wh'>9904.89</day></chan></electricity>" | nc -4u -q1 127.0.0.1 8000 > /dev/null 2>/dev/null &
```

App.php should print

```
This is an Electricity Packet
```

Now you're ready to write your own Storage!

###License
MIT

[OWL Monitor]:http://www.theowl.com/
[OWL Intuition-e]:http://www.theowl.com/index.php/energy-monitors/remote-monitoring/intuition-e/
[OWL Intuition-pv]:http://www.theowl.com/index.php/energy-monitors/solar-pv-monitoring/intuition-pv/