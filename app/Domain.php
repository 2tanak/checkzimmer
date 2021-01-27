<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\noCRUD;

class Domain extends Model {
    protected $table = 'domains';
    protected $fillable = ['subdomain', 'city', 'active'];
    function options() {
        return $this->hasMany(Option::class, 'parent')->where('type', 'domain');
    }
    function tagline() {
        foreach ($this->options->toArray() as $option) {
            if ($option['key'] == 'tagline') {
                return $option['value'];
            }
        }
        return '';
    }
    function geo() {
        foreach ($this->options->toArray() as $option) {
            if ($option['key'] == 'latlng') {
                return json_decode($option['value'], true);
            }
        }
        return '';
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
