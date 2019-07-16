<?php


namespace Domain\Catalog\Interfaces;


use Domain\Catalog\Collections\Products;

interface ProductsRepositoryInterface
{
    public function all(): Products;
}