<?php


namespace Domain\Catalog\Prices;


use Domain\Core\AbstractEntity;

class Currency extends AbstractEntity
{
	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return string
	 */
	public function setName(string $name): Currency
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getCode(): string
	{
		return $this->code;
	}

	/**
	 * @param string $code
	 * @return string
	 */
	public function setCode(string $code): Currency
	{
		$this->code = $code;

		return $this;
	}
	/**
	 * @var string
	 */
	protected $name = '';
	/**
	 * @var string
	 */
	protected $code = '';


}