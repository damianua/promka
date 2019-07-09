<?php


namespace Domain\Catalog\Entities;


use Domain\Catalog\Exceptions\CatalogException;
use Domain\Core\AbstractEntity;

class Currency extends AbstractEntity
{
    /**
     * @var string
     */
    protected $name = '';
    /**
     * @var string
     */
    protected $code = '';

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
     * @return Currency
     * @throws CatalogException
     */
	public function setCode(string $code): Currency
	{
	    $code = strtoupper($code);
	    if(!$this->checkCode($code)){
            throw CatalogException::getInvalidCurrencyCodeException($code);
        }

		$this->code = $code;

		return $this;
	}

	public function checkCode(string $code)
    {
        return strlen($code) <= 3;
    }
}