<?php

namespace App\Traits;

trait propertyFeatures {
    static function optionFind($options, $name, $default = null) {
        $option = array_reduce($options, function ($carry, $item) use ($name) {
            return $item['key'] == $name ? $item : $carry;
        }, false);
        return $option ? $option['value'] : $default;
    }
}
