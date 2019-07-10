<?php

namespace spec\Domain\Catalog\Prices;

use Domain\Catalog\Prices\Currency;
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
		$this->shouldBeAnInstanceOf(Currency::class);
	}

	function it_should_set_and_get_name()
	{
		$this->getName()->shouldReturn('');

		$name = 'Currency name';

		$this->setName($name)
			->getName()
			->shouldReturn($name);
	}

	function it_should_GetCode()
	{

	}
}
