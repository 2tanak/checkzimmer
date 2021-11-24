<?php

namespace App\Services;
use Request;

/**
 * Class LocaleHelper
 * Helper functions for locales
 *
 * @package App\Http\Services
 */

class LocaleHelper {

    /**
     * Get available languages
     *
     * @return array|string[]
     */
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

    /**
     * Get the default locale
     *
     * @return mixed
     */
    public function getDefaultLocale() {
        return env('APP_DEFAULT_LOCALE', 'de');
    }

    /**
     * Get URL for the provided locale
     *
     * @param $locale
     * @return string
     */
    public function getLocaleUrl($locale)
    {
        $path = Request::path();
        $fullPath = explode('/', $path);
        $locales = $this->getLanguagesAvailable();

        if (in_array($fullPath[0], $locales)) {
            unset($fullPath[0]);
        }

        $defaultLocale = $this->getDefaultLocale();

        $fullPath = array_diff($fullPath, array(''));

        if ($locale != $defaultLocale) {
            $fullPath = array_merge(array($locale), $fullPath);
        }

        $fullPath = array_merge(array(Request::root()), $fullPath);

        return implode('/', $fullPath);
    }

    /**
     * Get a proper localized route name by base route name and locale
     * @param $route
     * @return string
     */
    public function routeApply($route) {
        return $route."-".app()->getLocale();
    }
}
