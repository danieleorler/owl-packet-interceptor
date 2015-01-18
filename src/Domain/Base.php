<?php

namespace Dalen\OWLPacketInterceptor\Domain;

/**
 * Description of Base
 *
 * @author danieleorler
 */
class Base implements \JsonSerializable
{
    protected $fields;

    function __construct($data = NULL)
    {
        if($data !== NULL)
        {
            foreach($data AS $key=>$value)
            {
                $this->__set($key,$value);
            }
        }
    }

    public function __set($key, $value)
    {
        if(array_key_exists($key, $this->fields))
        {
            $this->fields[$key] = $value;
        }
    }

    public function __get($key)
    {
        if(array_key_exists($key, $this->fields))
        {
            return $this->fields[$key];
        }
        else
        {
            throw new \Exception("$key is not a valid property of class ".__CLASS__); 
        }
    }
    
    public function __isset($name)
    {
        return array_key_exists($name, $this->fields);
    }

    public function jsonSerialize()
    {
        return $this->fields;
    }
}
