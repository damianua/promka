<?php

namespace spec\Domain\Catalog\Categories;

use Domain\Catalog\Entities\Category;
use Domain\Core\AbstractEntity;
use PhpSpec\ObjectBehavior;

/**
 * Class CategorySpec
 * @package spec\Domain\Catalog\Categories
 * @mixin \Domain\Catalog\Entities\Category
 */
class CategorySpec extends ObjectBehavior
{
    function it_should_initializable()
    {
        $this->shouldBeAnInstanceOf(Category::class);
    }

    function it_should_extends_abstract_entity()
    {
        $this->shouldBeAnInstanceOf(AbstractEntity::class);
    }

    function it_should_set_and_get_name()
    {
        $this->getName()->shouldReturn('');

        $name = 'Category name';

        $this->setName($name)
            ->getName()
            ->shouldReturn($name);
    }

    function it_should_set_and_get_parent_category(\Domain\Catalog\Entities\Category $parentCategory)
    {
        $this->getParentCategory()->shouldReturn(null);

        $this->setParentCategory($parentCategory)
            ->getParentCategory()
            ->shouldReturn($parentCategory);
    }
}
