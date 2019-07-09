<?php


namespace Domain\Catalog\Products;


use Domain\Catalog\Categories\Category;
use Domain\Core\AbstractEntity;

class Product extends AbstractEntity
{
    protected $name = '';
    /**
     * @var Category
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
     * @return Category
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     * @return Product
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;

        return $this;
    }
}