<?php

namespace spec\Domain\Catalog\Collections;

use Domain\Catalog\Collections\ProductCategories;
use Domain\Catalog\Entities\Category;
use Domain\Catalog\Entities\Product;
use Domain\Catalog\Exceptions\CatalogException;
use Domain\Core\Structures\Collection;
use PhpSpec\ObjectBehavior;

/**
 * Class ProductCategoriesSpec
 * @package spec\Domain\Catalog\Collections
 * @mixin ProductCategories
 */
class ProductCategoriesSpec extends ObjectBehavior
{
    private $categories = [];
    private $product;

    function let(Product $product, Category $category1, Category $category2)
    {
        $this->product = $product;
        $this->categories = [$category1, $category2];

        $this->beConstructedWith($product, $this->categories);
    }

    function it_should_initializable()
    {
        $this->shouldBeAnInstanceOf(ProductCategories::class);
    }

    function it_should_extends_Collection()
    {
        $this->shouldBeAnInstanceOf(Collection::class);
    }

    function it_should_return_product()
    {
        $this->getProduct()->shouldReturn($this->product);
    }

    function it_should_set_and_get_canonical_category()
    {
        $canonicalCategory = last($this->categories);

        $this->setCanonical($canonicalCategory)->getCanonical()->shouldReturn($canonicalCategory);
    }

    function it_should_throw_exception_if_canonical_category_not_found_in_categories_while_set(Category $category)
    {
        $this->shouldThrow(CatalogException::class)->during('setCanonical', [$category]);
    }

    function i_should_add_category(Category $category)
    {
        $this->add($category)
            ->all()
            ->shouldReturn(array_merge($this->categories, $category));
    }
}
