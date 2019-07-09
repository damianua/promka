<?php


namespace Domain\Core\Structures;


use ArrayAccess;
use Domain\Core\Interfaces\Arrayable;
use Domain\Core\Interfaces\Jsonable;
use Iterator;

class Collection implements ArrayAccess, Iterator, Arrayable, Jsonable
{
    protected $items = [];

    public function __construct(array $items = [])
    {
        $this->fill($items);

        return $this;
    }

    public function fill(array $items)
    {
        $this->items = [];
        foreach($items as $offset => $item){
            $this->offsetSet($offset, $item);
        }

        return $this;
    }

    public function all(): array
    {
        return $this->items;
    }

    public function isEmpty(): bool
    {
        return empty($this->items);
    }

    public function count(): int
    {
        return count($this->items);
    }


    public function toJson(int $options = 0): string
    {
        $result = [];
        foreach($this->items as $key => $item){
            if($item instanceof Jsonable){
                $result[$key] = json_decode($item->toJson($options), true);
            }
            elseif($item instanceof Arrayable){
                $result[$key] = $item->toArray();
            }
            else{
                $result[$key] = $item;
            }
        }

        return json_encode($result, $options);
    }

    public function toArray(): array
    {
        $result = [];
        foreach($this->items as $key => $item){
            $result[$key] = ($item instanceof Arrayable)
                ? $item->toArray()
                : $item;
        }

        return $result;
    }

    public function current()
    {
        return current($this->items);
    }

    public function next()
    {
        return next($this->items);
    }

    public function key()
    {
        return key($this->items);
    }

    public function valid()
    {
        return isset($this->items[$this->key()]);
    }

    public function rewind()
    {
        reset($this->items);
    }

    public function offsetExists($offset)
    {
        return isset($this->items[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->offsetExists($offset)
            ? $this->items[$offset]
            : null;
    }

    public function offsetSet($offset, $value)
    {
        if(is_null($offset)){
            $this->items[] = $value;
        }
        else{
            $this->items[$offset] = $value;
        }
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        if($this->offsetExists($offset)){
            unset($this->items[$offset]);
        }
    }
}