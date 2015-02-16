<?php

namespace Dalen\OWLPacketInterceptor\Parser;

/**
 *
 * @author danieleorler
 */
interface IParser
{
    function setXMLElement(\SimpleXMLElement $xml);
    function parse();
}
