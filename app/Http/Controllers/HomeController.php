<?php

namespace App\Http\Controllers;

use App\FeatureCategory;
use App\Option;
use App\Property;
use App\Statistic;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

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

    public function single(Request $request)
    {
        return view('single');
    }

    public function singleProperty($slug)
    {
        $hotel = Property::where('slug', $slug)->firstOrFail();

        if ($hotel->access) {
            $access = true;
            return view('single-access', compact('hotel', 'access'));
        }

        $hotel->views++;
        $hotel->save();

        $options = $hotel->options->toArray();
        if (count($hotel->rating) > 0) {
             $hotel->rate = array_reduce( $hotel->rating->toArray(), function($carry, $item) {
                return $carry + $item['rating'];
            } ) / count($hotel->rating);
        }
        $questions = $hotel->questions;
        $reviews = $hotel->reviews;
        return view('single', compact('hotel','questions', 'reviews'));
    }
    public function singlePropertyAccess(Request $request, $slug) {
        $hotel = Property::where('slug', $slug)->firstOrFail();
        $fields = $request->all();
        if ($hotel->access) {
            $pins = explode(',', $hotel->access);
            if (array_search($fields['pin'], $pins) === false) {
                $access = false;
                return view('single-access', compact('hotel', 'access'));
            }
            $stat = new Statistic([
                'type_object' => 'property',
                'type_action' => 'access',
                'link' => $hotel->id,
                'params' => $fields['pin']
            ]);
            $stat->save();
        }
        $hotel->views++;
        $hotel->save();

        $options = $hotel->options->toArray();
        if (count($hotel->rating) > 0) {
            $hotel->rate = array_reduce( $hotel->rating->toArray(), function($carry, $item) {
                    return $carry + $item['rating'];
                } ) / count($hotel->rating);
        }
        $questions = $hotel->questions;
        $reviews = $hotel->reviews;

        return view('single', compact('hotel','questions', 'reviews'));
    }

    public function favorites()
    {
        return view('favorites');
    }
    public function plans()
    {
        return view('plans');
    }

}
