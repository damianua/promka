<?php


namespace Domain\CatalogLoader\WebSites;


abstract class AbstractWebSiteProductsRepository implements WebSiteProductsRepositoryInterface
{
    private $uri;

    public function __construct(string $uri)
    {
        $this->uri = $uri;
    }

    public function getUri(): string
    {
        return $this->uri;
    }
}