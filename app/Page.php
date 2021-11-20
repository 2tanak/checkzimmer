<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Class Page
 * Model for public pages
 *
 * @package App
 */

class Page extends Model
{
    /**
     * Model properties
     *
     * @property string $title page title
     * @property string slug page slug
     * @property string $text page text
     */

    use HasFactory;
    protected $table = 'pages';
    protected $fillable = ['title', 'slug', 'text'];
}
