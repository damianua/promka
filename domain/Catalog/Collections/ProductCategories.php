<?php


namespace Domain\Catalog\Collections;


use Domain\Catalog\Entities\Category;
use Domain\Catalog\Entities\Product;
use Domain\Catalog\Exceptions\CatalogException;
use Domain\Core\Structures\Collection;

/**
 * Class ProductCategories
 * @package Domain\Catalog\Collections
 * @method Category[] all()
 */
class ProductCategories extends Collection
{
    private $product;
    private $canonicalCategory;

    public function __construct(Product $product, array $categories = [])
    {
        parent::__construct($categories);
        $this->product = $product;
    }

    public function setCanonical($categoryId)
    {
        foreach($this->all() as $category){
            if($categoryId !== $category->getId()){
                continue;
            }
            $this->canonicalCategory = $category;

            return $this;
        }

        throw CatalogException::getCanonicalCategoryNotFound($categoryId);
    }

    public function getCanonical(): ?Category
    {
        return $this->canonicalCategory;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function add(Category $category)
    {
        $this->offsetSet(null, $category);

        return $this;
    }
}