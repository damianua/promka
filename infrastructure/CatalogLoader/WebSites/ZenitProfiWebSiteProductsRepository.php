<?php


namespace Infrastructure\CatalogLoader\WebSites;


use Domain\CatalogLoader\WebSites\AbstractWebSiteProductsRepository;

class ZenitProfiWebSiteProductsRepository extends AbstractWebSiteProductsRepository
{
    public function all()
    {
        $parser = new ZenitProfiWebSiteParser($this->getUri());
        $products = $parser->parseProducts();

        return $products;
    }
}