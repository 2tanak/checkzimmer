<?php

namespace App\Http\Controllers;

use App\Domain;
use App\FeatureCategory;
use App\Notifications\InquiryHotel;
use App\Option;
use App\Property;
use App\Services\WebsiteData;
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
        $data = WebsiteData::getOptions();
        $seoTitle = $data['title'];
        $seoDescription = $data['description'];
        $options = $data['options'];

        $phoneNumAdmin = Property::phoneFormat($data['options']['website_phone'] ?? '');

        return view('home', compact('options', 'seoTitle', 'seoDescription', 'phoneNumAdmin'));
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
        $data = WebsiteData::getOptions();
        $seoTitle = $data['title'];
        $seoDescription = $data['description'];
        $options = $data['options'];
        $date = $hotel->locDate();

        $phoneNumAdmin = Property::phoneFormat($data['options']['website_phone'] ?? '');
        $phoneNumLandlord = Property::phoneFormat($hotel->getCurrentOption('landlordPhoneNumber'));
        $phoneHide = substr($phoneNumLandlord, 0, 3) . 'X XXXXXXX';

        if ($hotel->access) {
            $access = true;
            return view('single-access', compact('options', 'hotel', 'access', 'phoneNumAdmin', 'phoneNumLandlord', 'seoTitle', 'seoDescription', 'phoneHide', 'date'));
        }

        $hotel->views++;
        $hotel->save();

        if (count($hotel->rating) > 0) {
             $hotel->rate = array_reduce( $hotel->rating->toArray(), function($carry, $item) {
                return $carry + $item['rating'];
            } ) / count($hotel->rating);
        }

        $questions = $hotel->questions;
        $reviews = $hotel->reviews;

        return view('single', compact('options', 'hotel', 'questions', 'reviews', 'phoneNumAdmin', 'phoneNumLandlord', 'seoTitle', 'seoDescription', 'phoneHide'));
    }
    public function singlePropertyAccess(Request $request, $slug) {
        $hotel = Property::where('slug', $slug)->firstOrFail();
        $data = WebsiteData::getOptions();
        $seoTitle = $data['title'];
        $seoDescription = $data['description'];
        $options = $data['options'];

        $phoneNumAdmin = Property::phoneFormat($data['options']['website_phone'] ?? '');
        $phoneNumLandlord = Property::phoneFormat($hotel->getCurrentOption('landlordPhoneNumber'));
        $phoneHide = substr($phoneNumLandlord, 0, 3) . 'X XXXXXXX';
        $date = $hotel->locDate();

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

        return view('single', compact('options', 'hotel', 'questions', 'reviews', 'phoneNumAdmin', 'phoneNumLandlord', 'seoTitle', 'seoDescription', 'phoneHide', 'date'));
    }

    public function favorites()
    {
        $data = WebsiteData::getOptions();
        $seoTitle = $data['title'];
        $seoDescription = $data['description'];
        $options = $data['options'];

        $phoneNumAdmin = Property::phoneFormat($data['options']['website_phone'] ?? '');

        return view('favorites', compact('options', 'seoTitle', 'seoDescription', 'phoneNumAdmin'));
    }
    public function plans()
    {
        $data = WebsiteData::getOptions();
        $seoTitle = $data['title'];
        $seoDescription = $data['description'];
        $options = $data['options'];

        $phoneNumAdmin = Property::phoneFormat($data['options']['website_phone'] ?? '');
        return view('plans', compact('options', 'seoTitle', 'seoDescription', 'phoneNumAdmin'));
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
            $recaptcha_secret = env('GOOGLE_RECAPTHCA3_SECRET');
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
