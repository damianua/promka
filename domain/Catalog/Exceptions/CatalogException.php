<?php


namespace Domain\Catalog\Exceptions;


use Domain\Catalog\Entities\Category;
use Domain\Core\Exceptions\MarketplaceException;

class CatalogException extends MarketplaceException
{
    const ERR_INVALID_CURRENCY_CODE = 101;
    const ERR_CANONICAL_CATEGORY_NOT_FOUND = 102;

    private $currencyCode;
    private $canonicalCategory;

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

    public static function getCanonicalCategoryNotFoundException(Category $canonicalCategory, \Throwable $prev = null)
    {
        $e = new static(
            'Category with id = "'.$canonicalCategory->getId().'" not found in product categories, so it cannot be set',
            self::ERR_CANONICAL_CATEGORY_NOT_FOUND,
            $prev
        );
        $e->canonicalCategory = $canonicalCategory;

        return $e;
    }

    public function getCanonicalCategoryId()
    {
        return $this->canonicalCategoryId;
    }
}