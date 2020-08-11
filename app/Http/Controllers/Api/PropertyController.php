<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Property;

class PropertyController extends Controller
{
    function index()
    {
        return response()->json(Property::ind());
    }
}
