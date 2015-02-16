<?php

namespace Dalen\OWLPacketInterceptor\Storage;

use Dalen\OWLPacketInterceptor\Packet\IPacket;

/**
 * Description of StdOutStorage
 *
 * @author danieleorler
 */
class StdOutStorage implements IStorage
{
    public function storePacket(IPacket $packet)
    {
        if($packet instanceof \Dalen\OWLPacketInterceptor\Packet\Solar\Solar)
        {
            echo("This is a Solar Packet");
        }
        
        if($packet instanceof \Dalen\OWLPacketInterceptor\Packet\Electricity\Electricity)
        {
            echo("This is an Electricity Packet");
        }
    }

    public function connect()
    {
        echo("StdOut Storage connected!");
    }

    public function disconnect()
    {
        echo("StdOut Storage disconnected!");
    }

}
