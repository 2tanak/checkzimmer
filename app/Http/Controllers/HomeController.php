<?php

namespace App\Http\Controllers;

use App\Option;
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
    public function favorites()
    {
        return view('favorites');
    }
}
