<?php


namespace Domain\Catalog\Entities;


use Domain\Catalog\Collections\ProductCategories;
use Domain\Core\AbstractEntity;

class Product extends AbstractEntity
{
    protected $name = '';
    /**
     * @var ProductCategories
     */
    protected $categories;

    public function __construct()
    {
    }

    public function setName(string $name = '')
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setCategories(ProductCategories $categories)
    {
        $this->categories = $categories;

        return $this;
    }

    public function getCategories()
    {
        $this->categories = $this->categories ?? new ProductCategories($this);

        return $this->categories;
    }
}