<?php

namespace Dalen\OWLPacketInterceptor\Domain;

/**
 * Description of Collection
 *
 * @author danieleorler
 */
class Collection implements \JsonSerializable
{
    private $items = array();
    
    public function addItem($obj)
    {
        $this->items[] = $obj;
    }
    
    public function getItem($id)
    {
        return $this->items[$id];
    }
    
    public function size()
    {
        return count($this->items);
    }
    
    public function isEmpty()
    {
        return count($this->items) === 0;
    }
    
    public function getInnerArray()
    {
        return $this->items;
    }

    public function jsonSerialize()
    {
        return $this->items;
    }
}
