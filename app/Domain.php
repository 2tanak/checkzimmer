<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\noCRUD;

class Domain extends Model {
    protected $table = 'domains';
    protected $fillable = ['subdomain', 'city', 'active'];
    function options() {
        return $this->hasMany(Option::class, 'parent')->where('type', 'domain');
    }
    private function getOption($name) {
        foreach ($this->options->toArray() as $option) {
            if ($option['key'] == $name) {
                return $option['value'];
            }
        }
        return '';
    }
    function tagline() {
        return $this->getOption('tagline');
    }
    function geo() {
        return $this->getOption('latlng');
    }
    function seoTitle() {
        return $this->getOption('seo_title');
    }
    function seoDescription() {
        return $this->getOption('seo_description');
    }
    function url() {
        $url = env('APP_URL', false);
        if (!$url) {
            return false;
        }
        $url = explode('//', $url);
        return $url[0] . '//' . $this->subdomain . '.' . $url[1];
    }
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
