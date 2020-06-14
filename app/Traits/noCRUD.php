<?php

namespace App\Traits;

trait noCRUD
{
    // Primary key
    //private static $identifier = 'id';

    // Children. Required to for getting linked data
    //private static $children = [];

    public static function getClass(){
        return static::class;
    }

    // Access rules
    private $access = [
        'create' => [
            'type' => 'value',
            'selector' => 'users.role',
            'value' => 'auth.role',
            'allow' => '*',
            'disallow' => 'banned'
        ],
        'read' => [],
        'update' => [],
        'delete' => []
    ];

    // Cascade
    private $cascade = [
    ];
    function accessible() {
        return true;
    }
    static function upd($fields, $selector = []) {
        $class = self::getClass();
        $id = static::$identifier ?: 'id';

        if (!empty($selector)) {
            $model = static::where($selector)->first();
            if (!$model) {
                $model = new $class;
            }
        } elseif (isset($fields[$id])) {
            $model = static::findOrFail($fields[$id]);
        } else {
            $model = new $class;
        }
        $model->fill($fields);
        $model->save();
        foreach (static::$children as $child) {
            if (!isset($fields[$child])) {
                continue;
            }
            $child::update($fields[$child]);
        }
    }
    static function ind() {
         return static::with(self::$children)->get();
    }
    static function get($id) {
        static::with(static::$children)->where(static::$identifier, $id)->get();
    }
    static function withParams($id, $params) {
        return static::with(static::$children)->where(function($query) use ($params) {
            foreach ($params as $key => $param) {
                $query->where($key, $param);
            }
        })->where(static::$identifier, $id)->get();
    }
    static function params($params) {
        return static::with(static::$children)->where(function($query) use ($params) {
            foreach ($params as $key => $param) {
                $query->where($key, $param);
            }
        })->get();
    }
}
