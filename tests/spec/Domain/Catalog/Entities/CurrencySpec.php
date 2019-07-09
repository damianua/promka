<?php

namespace spec\Domain\Catalog\Prices;

use Domain\Catalog\Entities\Currency;
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

        $code = 'UAH';

        $this->setCode($code)
            ->getCode()
            ->shouldReturn($code);
	}

	function it_should_throw_exception_if_code_has_invalid_format()
    {
        $rightCode = 'UAH';
        $invalidCode = 'Dollars';

//        $this->shouldNotThrow()
//        $this->shouldThrow()
    }
}
