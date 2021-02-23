<?php

namespace App\Http\Controllers;

use App\Domain;
use App\FeatureCategory;
use App\Notifications\InquiryHotel;
use App\Option;
use App\Property;
use App\Statistic;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Mail;

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

        $subdomain = Domain::getSubdomain();
        $subdomain = Domain::find(1);;
        $seoTite = '';
        $seoDescr = '';
        $options = Option::where('type', 'system')->get()->pluck('value', 'key');
        $copy = $options['copyright'];
        if ($subdomain) {
            $seoTitle = $subdomain->seoTitle();
            $seoDescription = $subdomain->seoDescription();
            $options = $subdomain->options()->get()->pluck('value', 'key');
        } else {
            $seoTitle = $options['seo_title'] ?? env('APP_NAME', '');
            $seoDescription = $options['seo_description'] ?? '';

        }
        $options['copyright'] = $copy;

        return view('home', compact('options', 'seoTitle', 'seoDescription'));
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
        $system_option = Option::where('type', 'system')->get()->pluck('value', 'key');

        if ($hotel->access) {
            $access = true;
            return view('single-access', compact('system_option', 'hotel', 'access'));
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
        return view('single', compact('system_option', 'hotel', 'questions', 'reviews'));
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
    public function redirect() {
        return response()->redirectToRoute(app('locale')->routeApply('home'));
    }
    public function inquiryForm(Request $request)
    {
        $data = $request->all();
        if ($this->checkRecaptha($data['grecaptcha'])) {
            $property = Property::findOrFail($data['property']);

            $notificationEmail = env('MAIL_NOTIFICATION_ADDRESS', '');
            if ($notificationEmail) {
                Mail::to($notificationEmail)->send(new InquiryHotel($property, $data));
                if ($data['email-checkbox']) {
                    Mail::to($data['email'])->send(new InquiryHotel($property, $data));
                }
            }
            return response()->json(['code' => 'ok']);
        } else {
            return response()->json(['code' => 'error']);
        }
    }
    public function checkRecaptha($response)
    {
        if (isset($response)) {
            $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
            $recaptcha_secret = '6LejY9AZAAAAAMdpXyOPSteQSPlngjVZVbF7Vb4Y';
            $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $response);
            $recaptcha = json_decode($recaptcha);
            if ($recaptcha->score < 0.5) {
                return false;
            }
            return true;
        }
        return false;
    }
}
