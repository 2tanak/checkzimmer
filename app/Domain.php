<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\noCRUD;

class Domain extends Model {
    protected $table = 'domains';
    protected $fillable = ['subdomain', 'city', 'active'];
}
