<?php

namespace App\Http\Controllers;

use App\Option;
use App\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $options = Option::where('type', 'system')->get()->pluck('value', 'key');
        
        return view('home', compact('options'));
    }
    public function dashboard() {
        return view('welcome');
    }
    public function list()
    {
        return view('list');
    }
    public function single()
    {
        return view('single');
    }
    public function singleProperty($slug)
    {
        $hotel = Property::where('slug', $slug)->firstOrFail();

        $hotel->views++;
        $hotel->save();
        $options = $hotel->options->toArray();
        
        if (count($hotel->rating) > 0) {
            $hotel->rate = array_reduce( $hotel->rating->toArray(), function($carry, $item) { 
                return $carry + $item['rating']; 
            } ) / count($hotel->rating);
        }
        
        $rooms = $hotel->rooms;
        
        return view('single', compact('hotel','rooms'));
    }
    public function favorites()
    {
        return view('favorites');
    }
}
