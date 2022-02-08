<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductStorage\Business\Storage;

use Generated\Shared\Transfer\ProductConcreteStorageTransfer;
use Spryker\Zed\ProductStorage\Business\Storage\ProductConcreteStorageWriter as SprykerProductConcreteStorageWriter;
use Spryker\Zed\ProductStorage\Dependency\Facade\ProductStorageToProductInterface;
use Spryker\Zed\ProductStorage\Persistence\ProductStorageQueryContainerInterface;

/**
 * @property \Pyz\Zed\ProductStorage\Persistence\ProductStorageQueryContainerInterface $queryContainer
 */
class ProductConcreteStorageWriter extends SprykerProductConcreteStorageWriter
{
    /**
     * @var WeightAttributeFilterInterface
     */
    protected $weightAttributeFilter;

    /**
     * @param \Spryker\Zed\ProductStorage\Dependency\Facade\ProductStorageToProductInterface $productFacade
     * @param \Spryker\Zed\ProductStorage\Persistence\ProductStorageQueryContainerInterface $queryContainer
     * @param bool $isSendingToQueue
     * @param WeightAttributeFilterInterface $weightAttributeFilter
     */
    public function __construct(
        ProductStorageToProductInterface $productFacade,
        ProductStorageQueryContainerInterface $queryContainer,
        $isSendingToQueue,
        $weightAttributeFilter
    ) {
        parent::__construct($productFacade, $queryContainer, $isSendingToQueue);
        $this->weightAttributeFilter = $weightAttributeFilter;
    }

    /**
     * @param array $productConcreteLocalizedEntity
     *
     * @return \Generated\Shared\Transfer\ProductConcreteStorageTransfer
     */
    protected function mapToProductConcreteStorageTransfer(array $productConcreteLocalizedEntity)
    {
        $attributes = $this->getConcreteAttributes($productConcreteLocalizedEntity);

        $spyProductConcreteEntityArray = $productConcreteLocalizedEntity['SpyProduct'];
        unset($productConcreteLocalizedEntity['attributes']);
        unset($spyProductConcreteEntityArray['attributes']);

        $bundledProductIds = $this->getBundledProductIdsByProductConcreteId($spyProductConcreteEntityArray['id_product']);

        $productStorageTransfer = (new ProductConcreteStorageTransfer())
            ->fromArray($productConcreteLocalizedEntity, true)
            ->fromArray($spyProductConcreteEntityArray, true)
            ->setBundledProductIds($bundledProductIds)
            ->setIdProductConcrete($productConcreteLocalizedEntity[static::COL_FK_PRODUCT])
            ->setIdProductAbstract($spyProductConcreteEntityArray[static::COL_FK_PRODUCT_ABSTRACT])
            ->setDescription($this->getDescription($productConcreteLocalizedEntity))
            ->setAttributes($this->weightAttributeFilter->filter($attributes))
            ->setSuperAttributesDefinition($this->getSuperAttributeKeys($attributes));

        return $productStorageTransfer;
    }

    /**
     * @param int $idProductConcrete
     *
     * @return array
     */
    protected function getBundledProductIdsByProductConcreteId($idProductConcrete)
    {
        $result = [];
        $bundleProducts = $this->queryContainer->queryBundledProductIdsByProductConcreteId($idProductConcrete)->find()->toArray();
        foreach ($bundleProducts as $bundleProduct) {
            $result[$bundleProduct['FkBundledProduct']] = $bundleProduct['Quantity'];
        }

        return $result;
    }
}
