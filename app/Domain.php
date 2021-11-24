<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\noCRUD;

/**
 * Class Domain
 * Model for website domains
 *
 * @package App
 */

class Domain extends Model {
    /**
     * Model properties
     *
     * @property string $subdomain subdomain name
     * @property string $name related city name
     * @property bool $active activity flag (no active = disabled)
     */
    protected $table = 'domains';
    protected $fillable = ['subdomain', 'city', 'active'];

    /**
     * Return related options
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function options() {
        return $this->hasMany(Option::class, 'parent')->where('type', 'domain');
    }

    /**
     * Return specific option by name
     * ToDo: replace with function added via trait optionsLink?
     *
     * @param $name
     * @return string
     */
    private function getOption($name) {
        foreach ($this->options->toArray() as $option) {
            if ($option['key'] == $name) {
                return $option['value'];
            }
        }
        return '';
    }

    /**
     * Return tagline
     * @return string
     */
    function tagline() {
        return $this->getOption('tagline');
    }

    /**
     * Return geocoordinates
     * @return string
     */
    function geo() {
        return $this->getOption('latlng');
    }

    /**
     * Return SEO title
     * @return string
     */
    function seoTitle() {
        return $this->getOption('seo_title');
    }

    /**
     * Return SEO description
     * @return string
     */
    function seoDescription() {
        return $this->getOption('seo_description');
    }

    /**
     * Return domain URL
     * @return false|string
     */
    function url() {
        $url = env('APP_URL', false);
        if (!$url) {
            return false;
        }
        $url = explode('//', $url);
        return $url[0] . '//' . $this->subdomain . '.' . $url[1];
    }

    /**
     * Return current domain data
     * @return false
     */
    static function getSubdomain() {
        $url = url()->current();
        if ($url == env('APP_URL', false)) {
            return false;
        }
        $url = explode('//', $url);
        $url = explode('.', $url[1]);

        return self::where('subdomain', $url[0])->first();
    }
}
