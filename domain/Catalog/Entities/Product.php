<?php


namespace Domain\Catalog\Entities;


use Domain\Catalog\Entities\Category;
use Domain\Core\AbstractEntity;

class Product extends AbstractEntity
{
    protected $name = '';
    /**
     * @var \Domain\Catalog\Entities\Category
     */
    protected $category;

    public function setName(string $name = '')
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return \Domain\Catalog\Entities\Category
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * @param \Domain\Catalog\Entities\Category $category
     * @return Product
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;

        return $this;
    }
}