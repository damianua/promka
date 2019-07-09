<?php


namespace Domain\Core;


use Domain\Core\Interfaces\Storagable;

abstract class AbstractEntity implements Storagable
{
    protected $id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}