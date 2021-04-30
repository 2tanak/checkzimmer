<?php

namespace App\Services;

use App\Domain;
use App\Option;

class WebsiteData {
    static public function getOptions() {
        $subdomain = Domain::getSubdomain();
        $options = Option::where('type', 'system')->get()->pluck('value', 'key')->all();

        $copy = $options['copyright'];
        if ($subdomain) {
            $seoTitle = $subdomain->seoTitle();
            $seoDescription = $subdomain->seoDescription();
            $options = $subdomain->options()->get()->pluck('value', 'key');
        } else {
            $seoTitle = $options['seo_title'] ?? env('APP_NAME', '');
            $seoDescription = $options['seo_description'] ?? '';
        }
        $options['copyright'] = $copy;

        return [ 'title' => $seoTitle, 'description' => $seoDescription, 'options' => $options ];
    }
}
