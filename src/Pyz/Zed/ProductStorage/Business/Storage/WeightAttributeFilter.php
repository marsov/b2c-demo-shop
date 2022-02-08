<?php

namespace Pyz\Zed\ProductStorage\Business\Storage;

class WeightAttributeFilter implements WeightAttributeFilterInterface
{
    public const WEIGHT = 'weight';

    /**
     * @inheritDoc
     */
    public function filter(array $attributes): array
    {
        if (isset($attributes[static::WEIGHT]) && empty($attributes[static::WEIGHT])) {
            unset($attributes[static::WEIGHT]);
        }

        return $attributes;
    }
}
