<?php

namespace spec\Domain\Catalog\Products;

use Domain\Catalog\Categories\Category;
use Domain\Core\AbstractEntity;
use Domain\Catalog\Products\Product;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class ProductSpec
 * @package spec\Domain\Products
 * @mixin \Domain\Catalog\Products\Product
 */
class ProductSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Product::class);
    }

    function it_should_extends_AbstractEntity()
    {
        $this->shouldBeAnInstanceOf(AbstractEntity::class);
    }

    function it_should_set_and_get_name()
    {
        $this->getName()->shouldReturn('');

        $name = 'Product name';

        $this->setName($name)
            ->getName()
            ->shouldReturn($name);
    }

    function it_should_set_and_get_category(Category $category)
    {
        $this->getCategory()->shouldReturn(null);

        $this->setCategory($category)
            ->getCategory()
            ->shouldReturn($category);
    }
}
