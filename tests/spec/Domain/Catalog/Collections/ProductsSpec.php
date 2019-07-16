<?php

namespace spec\Domain\Catalog\Collections;

use Domain\Catalog\Collections\Products;
use Domain\Core\Structures\Collection;
use PhpSpec\ObjectBehavior;

class ProductsSpec extends ObjectBehavior
{
    function it_should_initializable()
    {
        $this->shouldBeAnInstanceOf(Products::class);
    }

    function it_should_extends_Collection()
    {
        $this->shouldBeAnInstanceOf(Collection::class);
    }
}
