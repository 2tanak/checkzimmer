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
}
