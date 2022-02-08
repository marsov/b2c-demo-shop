<?php

namespace Pyz\Zed\ProductStorage\Business\Storage;

interface WeightAttributeFilterInterface
{
    /**
     * Filter empty weight attribute
     *
     * @return array
     */
    public function filter(array $attributes): array;
}
