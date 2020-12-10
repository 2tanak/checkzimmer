<?php

namespace App;

use App\Traits\noCRUD;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use noCRUD;

    protected $table = 'questions';
    protected $fillable = ['property_id', 'question', 'response'];

    static function reCAPTCHA3($response)
    {
        if (!RECAPTCHA_SITE){
            return true;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($response)){
            $recaptcha_url = '<https://www.google.com/recaptcha/api/siteverify';
            $recaptcha_secret = RECAPTCHA_SECRET;
            $recaptcha_response = $response;

            // Make and decode POST request:
            $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
            $recaptcha = json_decode($recaptcha);
            // Take action based on the score returned:
            if ($recaptcha->score < 0.5){
                return false;
            }
            return true;
        }
        return false;
    }
}
