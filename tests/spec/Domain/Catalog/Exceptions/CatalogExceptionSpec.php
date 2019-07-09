<?php

namespace spec\Domain\Catalog\Exceptions;

use Domain\Catalog\Exceptions\CatalogException;
use PhpSpec\ObjectBehavior;

class CatalogExceptionSpec extends ObjectBehavior
{
    function it_should_initializable()
    {
        $this->shouldBeAnInstanceOf(CatalogException::class);
    }

    function it_should_be_throwable()
    {
        $this->shouldBeAnInstanceOf(\Throwable::class);
    }

    function it_can_be_created_for_invalid_currency_code_exception()
    {
        $this->beConstructedThrough('getInvalidCurrencyCodeException', ['dollar']);
        $this->getCurrencyCode()->shouldReturn('dollar');
        $this->getCode()->shouldReturn(CatalogException::ERR_INVALID_CURRENCY_CODE);
    }
}
