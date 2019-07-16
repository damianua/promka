<?php


namespace Domain\CatalogLoader\WebSites;


use Domain\CatalogLoader\ProductsRepositoryInterface;

interface WebSiteProductsRepositoryInterface extends ProductsRepositoryInterface
{
    public function getUri(): string;
}