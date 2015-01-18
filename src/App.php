<?php

require_once('Listener.php');
require_once('XMLDataReader.php');
require_once('Storage.php');

$listener = new Listener(8123);
$storage = new Storage();

while(true)
{
    $xmlReader = new XMLDataReader($listener->read());

    $storage->log((int)$xmlReader->getXml()->chan[0]->curr);
}