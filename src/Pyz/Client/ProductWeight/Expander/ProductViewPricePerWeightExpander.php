<?php

namespace Pyz\Client\ProductWeight\Expander;

use Generated\Shared\Transfer\PriceProductFilterTransfer;
use Generated\Shared\Transfer\ProductViewTransfer;
use Spryker\Client\PriceProductStorage\Dependency\Client\PriceProductStorageToPriceProductClientInterface;
use Spryker\Client\PriceProductStorage\Dependency\Service\PriceProductStorageToPriceProductServiceInterface;
use Spryker\Client\PriceProductStorage\Expander\ProductViewPriceExpanderInterface;
use Spryker\Client\PriceProductStorage\Storage\PriceAbstractStorageReaderInterface;
use Spryker\Client\PriceProductStorage\Storage\PriceConcreteStorageReaderInterface;

class ProductViewPricePerWeightExpander implements ProductViewPricePerWeightExpanderInterface
{

    /**
     * @inheritDoc
     */
    public function expandProductViewData(
        ProductViewTransfer $productViewTransfer,
        array $productData,
        string $localeName
    ): ProductViewTransfer {
        return $productViewTransfer;
    }
}
