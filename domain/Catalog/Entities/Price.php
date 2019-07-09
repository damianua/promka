<?php


namespace Domain\Catalog\Prices;


use Domain\Core\AbstractEntity;

class Price extends AbstractEntity
{
	/**
	 * @var string
	 */
	protected $name = '';
	/**
	 * @var Currency
	 */
	protected $currency;

	/**
	 * @param string $name
	 * @return Price
	 */
	public function setName(string $name): ?Price
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @param Currency $currency
	 * @return Price
	 */
	public function setCurrency(Currency $currency): Price
	{
		$this->currency = $currency;

		return $this;
	}

	/**
	 * @return Currency
	 */
	public function getCurrency(): ?Currency
	{
		return $this->currency;
	}
}