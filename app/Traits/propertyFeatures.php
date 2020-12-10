<?php

namespace App\Traits;

trait propertyFeatures {
    static function optionFind($options, $name) {
        $option = array_reduce($options, function ($carry, $item) use ($name) {
            return $item['key'] == $name ? $item : $carry;
        });
        return $option ? $option['value'] : null;
    }
}
