<?php

namespace Pyz\Client\ProductWeight\Expander;

use Generated\Shared\Transfer\ProductViewTransfer;

interface ProductViewPricePerWeightExpanderInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductViewTransfer $productViewTransfer
     * @param array $productData
     * @param string $localeName
     *
     * @return \Generated\Shared\Transfer\ProductViewTransfer
     */
    public function expandProductViewData(
        ProductViewTransfer $productViewTransfer,
        array $productData,
        string $localeName
    ): ProductViewTransfer;
}
