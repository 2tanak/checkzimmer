<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $table = 'statistic';
    
    protected $fillable = [
        'type_object', 
        'type_action', 
        'link', 
        'params'
    ];
}