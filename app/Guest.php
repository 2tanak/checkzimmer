<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model {
    protected $table = 'guests';
    protected $fillable = ['pin', 'name', 'email', 'reference', 'active'];

}
