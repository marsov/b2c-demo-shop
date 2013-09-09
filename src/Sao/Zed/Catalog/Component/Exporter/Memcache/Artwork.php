<?php

class Sao_Zed_Catalog_Component_Exporter_Memcache_Artwork extends Sao_Zed_Catalog_Component_Exporter_Memcache_Products
{

    /**
     * @return string
     */
    protected function getProductAttributeSetName()
    {
        return self::ATTRIBUTESET_ARTWORK;
    }

    /**
     * @return ProjectA_Zed_Catalog_Component_Exporter_QueryBuilder_AbstractProduct
     */
    protected function getProductQueryBuilder()
    {
        return $this->factory->getExporterQueryBuilderMemcacheArtwork();
    }

    /**
     * @param array $product
     * @return array
     */
    protected function transformProductToData($product)
    {
        //TODO transform or/and enrich data and/or keys
        $pairProductData = $product;
//        $pairProductData[self::STORAGEKEY_PRODUCT_SKU] = $sku = $product['sku'];;
//        $pairProductData[self::STORAGEKEY_PRODUCT_ATTRIBUTE_SET] = $this->getRimAttributeSetName();
//        $pairProductData[self::STORAGEKEY_PRODUCT_PRICE] = $product['price'];
//        $pairProductData[self::STORAGEKEY_PRODUCT_QUANTITY] = $product['quantity'];
//        $pairProductData[self::STORAGEKEY_PRODUCT_ID_CATALOG_PRODUCT] = $product['id_catalog_product'];

        return $pairProductData;
    }
}
