<?php

namespace Dalen\OWLPacketInterceptor\Storage;

use Dalen\OWLPacketInterceptor\Domain\Electricity\Electricity;

/**
 * Description of StdOutStorage
 *
 * @author danieleorler
 */
class StdOutStorage implements IStorage
{
    public function storeElectricity(Electricity $electricity)
    {
        echo(json_encode($electricity));
    }
}
