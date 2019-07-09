<?php


namespace Domain\Catalog\Entities;


use Domain\Core\AbstractEntity;

class Category extends AbstractEntity
{
    protected $name = '';
    /**
     * @var Category
     */
    protected $parentCategory;

    public function setName(string $name)
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
    public function getParentCategory(): ?Category
    {
        return $this->parentCategory;
    }

    /**
     * @param Category $parentCategory
     * @return Category
     */
    public function setParentCategory(Category $parentCategory)
    {
        $this->parentCategory = $parentCategory;

        return $this;
    }
}