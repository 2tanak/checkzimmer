<?php

namespace App;

use App\Traits\noCRUD;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use noCRUD;
    protected $table = 'questions';
    protected $fillable = ['property_id', 'question', 'response'];
    //
}
