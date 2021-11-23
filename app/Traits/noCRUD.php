<?php

namespace App\Traits;

/**
 * Trait noCRUD
 * Abstraction for CRUD operations
 * ToDo: to be removed with the conventional Laravel functions
 *
 * @package App\Http\ServiceTraits
 */


trait noCRUD
{
    // Primary key
    //private static $identifier = 'id';

    // Children. Required to for getting linked data
    //private static $children = [];

    /**
     * Returns current class name
     *
     * @return string
     */
    public static function getClass(){
        return static::class;
    }

    /**
     * @var array $access Access rules
     */
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

    /**
     * @var $cascade for cascade operations
    */
    private $cascade = [
    ];

    /**
     * Check if data can be accessed
     * @return bool
     */
    function accessible(): bool
    {
        return true;
    }

    /**
     * Update model
     *
     * @param $fields
     * @param array $selector
     */
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

    /**
     * Index models
     *
     * @param int $paginate
     * @return mixed
     */
    static function ind($paginate = 0) {
        if (!$paginate) {
            return static::with(self::$children)->get();
        }
        return static::with(self::$children)->paginate($paginate);
    }

    /**
     * Paginated index
     *
     * @return mixed
     */
    public static function indPaginated()
    {
        return static::with(self::$children)->paginate(30);
    }

    /**
     * Cascaded get for model data
     *
     * @param $id
     */
    static function get($id) {
        static::with(static::$children)->where(static::$identifier, $id)->get();
    }

    /**
     * Advanced get with params for custom $id field
     *
     * @param $id
     * @param $params
     * @return mixed
     */
    static function withParams($id, $params) {
        return static::with(static::$children)->where(function($query) use ($params) {
            foreach ($params as $key => $param) {
                $query->where($key, $param);
            }
        })->where(static::$identifier, $id)->get();
    }

    /**
     * Advanced get with params for classic id field
     *
     * @param $params
     * @return mixed
     */
    static function params($params) {
        return static::with(static::$children)->where(function($query) use ($params) {
            foreach ($params as $key => $param) {
                $query->where($key, $param);
            }
        })->get();
    }
}
