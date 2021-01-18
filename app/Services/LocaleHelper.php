<?php

namespace App\Services;

use Illuminate\Http\Request;

class LocaleHelper {
    public function getLanguagesAvailable() {
        $dir = __DIR__.'/../../resources/lang';
        $files = scandir($dir);
        $files = array_filter($files, function($file) use ($dir) {
            return $file != '.' && $file != '..' && !is_dir("$dir/$file");
        });
        $files = array_map(function($file) {
            $file = explode('.', $file);
            return $file[0];
        }, $files);
        return $files;
    }
    public function getCurrentLocale() {
        return 'de';
    }
    public function getLocaleUrl($lang) {
        $url = explode('/', url()->current());
        $url[3] = $lang;
        return implode('/', $url);
    }
    public function routeApply($route) {
        return $route."-".app()->getLocale();
    }
}
