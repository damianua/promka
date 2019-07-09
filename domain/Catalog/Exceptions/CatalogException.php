<?php


namespace Domain\Catalog\Exceptions;


use Domain\Core\Exceptions\MarketplaceException;

class CatalogException extends MarketplaceException
{
    const ERR_INVALID_CURRENCY_CODE = 101;

    private $currencyCode;

    /**
     * @param $currencyCode
     * @param \Throwable|null $prev
     * @return CatalogException
     */
    public static function getInvalidCurrencyCodeException($currencyCode, \Throwable $prev = null)
    {
        $e = new static(
            'Invalid currency code. See ISO-4217 for more information',
            self::ERR_INVALID_CURRENCY_CODE,
            $prev
        );
        $e->currencyCode = $currencyCode;

        return $e;
    }

    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }
}