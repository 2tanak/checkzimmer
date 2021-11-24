<?php

namespace App\Traits;

/**
 * Trait propertyFeatures
 * Property features metadata helpers
 *
 * @package App\Http\ServiceTraits
 */

trait propertyFeatures {
    /**
     * Find an option from options array
     *
     * @param $options
     * @param $name
     * @param null $default
     * @return mixed|null
     */
    static function optionFind($options, $name, $default = null) {
        $option = array_reduce($options, function ($carry, $item) use ($name) {
            return $item['key'] == $name ? $item : $carry;
        }, false);
        return $option ? $option['value'] : $default;
    }
}
