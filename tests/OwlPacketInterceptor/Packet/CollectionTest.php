<?php

namespace OWLPacketInterceptor\Packet;

use Dalen\OWLPacketInterceptor\Packet\Collection;

/**
 * Description of Collection
 *
 * @author danieleorler
 */
class CollectionTest extends \PHPUnit_Framework_TestCase
{
    private $collection;
    
    public function __construct()
    {
        $this->collection = new Collection();
    }
    
    public function testGetItem()
    {
        $this->collection->addItem("test");
        $this->assertEquals('test', $this->collection->getItem(0));
    }
    
    public function testSize()
    {
        $this->assertEquals(0, $this->collection->size());
        $this->collection->addItem("test");
        $this->assertEquals(1, $this->collection->size());
    }

    public function testIsEmpty()
    {
        $this->assertEquals(true, $this->collection->isEmpty());
    }

    public function testGetInnerArray()
    {
        $this->collection->addItem("test");
        $this->collection->addItem("me");
        $this->assertEquals(array('test','me'), $this->collection->getInnerArray());
    }
}
