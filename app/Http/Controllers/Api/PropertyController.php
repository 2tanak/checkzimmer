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
    function show($id) {
        return response()->json(Property::findOrFail($id));
    }
    function init() {
        $property = Property::orderBy('created_at')->limit(10)->get();
        return response()->json($property);
    }
}
