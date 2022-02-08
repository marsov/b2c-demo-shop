<?php

namespace Pyz\Client\ProductWeight\Plugin;

use Generated\Shared\Transfer\ProductViewTransfer;
use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\ProductStorageExtension\Dependency\Plugin\ProductConcreteViewExpanderExcluderPluginInterface;
use Spryker\Client\ProductStorageExtension\Dependency\Plugin\ProductViewExpanderPluginInterface;

/**
 * @method \Pyz\Client\ProductWeight\ProductWeightFactory getFactory()
 */
class PricePerWeightProductViewExpanderPlugin extends AbstractPlugin implements ProductViewExpanderPluginInterface, ProductConcreteViewExpanderExcluderPluginInterface
{
    /**
     * {@inheritDoc}
     * - Expands the product view with price per weight value.
     *
     * @param \Generated\Shared\Transfer\ProductViewTransfer $productViewTransfer
     * @param array $productData
     * @param string $localeName
     *
     * @return \Generated\Shared\Transfer\ProductViewTransfer
     */
    public function expandProductViewTransfer(ProductViewTransfer $productViewTransfer, array $productData, $localeName)
    {
        return $this->getFactory()
            ->createProductViewPricePerWeightExpander()
            ->expandProductViewData($productViewTransfer, $productData, $localeName);
    }
}
