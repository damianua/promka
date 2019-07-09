<?php

namespace spec\Domain\Catalog\Entities;

use Domain\Catalog\Entities\Currency;
use Domain\Catalog\Exceptions\CatalogException;
use PhpSpec\ObjectBehavior;

/**
 * Class CurrencySpec
 * @package spec\Domain\Catalog\Prices
 * @mixin Currency
 */
class CurrencySpec extends ObjectBehavior
{

	function it_should_initializable()
	{
		$this->shouldBeAnInstanceOf(\Domain\Catalog\Entities\Currency::class);
	}

	function it_should_set_and_get_name()
	{
		$this->getName()->shouldReturn('');

		$name = 'Currency name';

		$this->setName($name)
			->getName()
			->shouldReturn($name);
	}

    function it_should_set_and_get_code()
	{
        $this->getCode()->shouldReturn('');

        $this->setCode('uah')
            ->getCode()
            ->shouldReturn('UAH');
	}

    function it_should_throw_exception_if_code_has_invalid_format()
    {
        $rightCode = 'UAH';
        $invalidCode = 'Dollars';

        $this->shouldNotThrow(CatalogException::class)->during('setCode', [$rightCode]);
        $this->shouldThrow(CatalogException::class)->during('setCode', [$invalidCode]);
    }
}
