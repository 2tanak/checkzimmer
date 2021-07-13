<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    public const ADMIN = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'role', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public static function getTotalUsersVerifiedProfiles($type)
    {
        if (!$type){
            return self::whereNotNull('email_verified_at')->count();
        } else {
            return self::whereNull('email_verified_at')->count();
        }
    }

    public function getUserEmail()
    {
        return $this->email;
    }
    public function metaUpdate($key, $value) {
        $option = Option::where('parent', $this->id)->where('type', 'user')->where('key', $key)->first();
        if (!$option) {
            $option = Option::create([
                'parent' => $this->id,
                'type' => 'user',
                'key' => $key,
                'value' => is_array($value) ? json_encode($value) : $value
            ]);
        } else {
            $option->value = $value;
            $option->save();
        }
        return $option;
    }
}
