<?php

namespace App\Services;


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
        return env('APP_DEFAULT_LOCALE');
    }

    public function getLocaleUrl($locale)
    {
        $path = \Request::path();
        $fullPath = explode('/', $path);
        $locales = $this->getLanguagesAvailable();

        if(in_array($fullPath[0],$locales)){
            unset($fullPath[0]);
        }

        $defaultLocale = $this->getCurrentLocale();

        $fullPath = array_diff($fullPath, array(''));

        if($locale != $defaultLocale){
            $fullPath = array_merge(array($locale), $fullPath);
        }

        $fullPath = array_merge(array(env("APP_URL")), $fullPath);

        return implode('/', $fullPath);
    }
    public function routeApply($route) {
        return $route."-".app()->getLocale();
    }
}
