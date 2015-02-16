<?php

namespace Dalen\OWLPacketInterceptor\Storage;

use Dalen\OWLPacketInterceptor\Packet\IPacket;

/**
 *
 * @author danieleorler
 */
interface IStorage
{
    function connect();
    function storePacket(IPacket $electricity);
    function disconnect();
}
