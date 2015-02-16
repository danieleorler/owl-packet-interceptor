<?php

namespace Dalen\OWLPacketInterceptor\Packet;

/**
 *
 * @author danieleorler
 */
interface IPacket
{
    function getId();
    function getType();
    function toJson();
}
