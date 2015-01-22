<?php

namespace Dalen\OWLPacketInterceptor\Storage;

use Dalen\OWLPacketInterceptor\Domain\Electricity\Electricity;

/**
 *
 * @author danieleorler
 */
interface IStorage
{
    function storeElectricity(Electricity $electricity);
}
