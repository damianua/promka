<?php

namespace spec\Domain\Core\Exceptions;

use Domain\Core\Exceptions\MarketplaceException;
use PhpSpec\ObjectBehavior;

class MarketplaceExceptionSpec extends ObjectBehavior
{
    function it_should_initializable()
    {
        $this->shouldBeAnInstanceOf(MarketplaceException::class);
    }

    function it_should_be_throwable()
    {
        $this->shouldBeAnInstanceOf(\Throwable::class);
    }
}
