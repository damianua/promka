<?php

namespace spec\Domain\Catalog\Prices;

use Domain\Catalog\Prices\Currency;
use Domain\Catalog\Prices\Price;
use Domain\Core\AbstractEntity;
use PhpSpec\ObjectBehavior;

/**
 * Class PriceSpec
 * @package spec\Domain\Catalog\Prices
 * @mixin Price
 */
class PriceSpec extends ObjectBehavior
{
	function it_should_initializable()
	{
		$this->shouldBeAnInstanceOf(Price::class);
	}

	function it_should_extends_abstract_entity()
	{
		$this->shouldBeAnInstanceOf(AbstractEntity::class);
	}

	function it_should_set_and_get_name()
	{
		$this->getName()->shouldReturn('');

		$name = 'Price name';

		$this->setName($name)
			->getName()
			->shouldReturn($name);
	}

	function it_should_set_and_get_currency(Currency $currency)
	{
		$this->getCurrency()->shouldReturn(null);

		$this->setCurrency($currency)
			->getCurrency()
			->shouldReturn($currency);
	}
}
