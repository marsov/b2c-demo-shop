<?php

namespace Pyz\Client\ProductWeight;

use Pyz\Client\ProductWeight\Expander\ProductViewPricePerWeightExpander;
use Pyz\Client\ProductWeight\Expander\ProductViewPricePerWeightExpanderInterface;
use Spryker\Client\Kernel\AbstractFactory;

class ProductWeightFactory extends AbstractFactory
{
    /**
     * @return ProductViewPricePerWeightExpanderInterface
     */
    public function createProductViewPricePerWeightExpander(): ProductViewPricePerWeightExpanderInterface
    {
        return new ProductViewPricePerWeightExpander();
    }
}
