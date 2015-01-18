<?php

class XMLDataReader
{
    private $xml;

    public function __construct($string)
    {
        $this->xml = new SimpleXMLElement($string);
    }

    public function getXml()
    {
        return $this->xml;
    }
}