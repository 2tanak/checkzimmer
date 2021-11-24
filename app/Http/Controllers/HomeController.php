<?php

namespace App\Http\Controllers;

use App\Domain;
use App\Http\Requests\InquiryFormRequest;
use App\Notifications\InquiryHotel;
use App\Option;
use App\Page;
use App\Property;
use App\Room;
use App\Services\GeocoderService;
use App\Services\RoiStatService;
use App\Services\WebsiteData;
use App\Statistic;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Request as MainRequest;

/**
 * Class HomeController
 * Handles public page requests
 *
 * @package App\Http\Controllers
 */

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
     * Shows the home page for current domain
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request): View
    {
        $data = WebsiteData::getOptions();
        $seoTitle = $data['title'];
        $seoDescription = $data['description'];
        $options = $data['options'];

        $phoneNumAdmin = Property::phoneFormat($data['options']['website_phone'] ?? '');

        if (Domain::getSubdomain()) {
            $getData = $request->all();
            return view('home-subdomain', compact('options', 'seoTitle', 'seoDescription', 'phoneNumAdmin', 'getData'));
        } else {
            $subdomains = [];
            foreach (Domain::all() as $domain) {
                $cityName = $domain->city;
                $countRooms = 0;

                foreach (Room::all()->whereIn('property_id', property::all()->where('city', $cityName)->getQueueableIds())->all() as $room) {
                    $countRooms += $room->number;
                }
                $secure = MainRequest::secure() ? 'https://' : 'http://';
                $subdomains[] = [
                    'link' => $secure.$domain->subdomain.'.'.MainRequest::getHttpHost(),
                    'city' => $cityName,
                    'count' => $countRooms,
                    'subdomain' => $domain->subdomain
                ];
            }

            return view('home', compact('options', 'seoTitle', 'seoDescription', 'phoneNumAdmin','subdomains'));
        }
    }

    /**
     * Show the application dashboard
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function dashboard(): View
    {
        return view('welcome');
    }

    /**
     * Shows single page
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function single(Request $request): View
    {
        return view('single');
    }

    /**
     * Shows singl property page
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\View
     */
    public function singleProperty($slug): View
    {
        $hotel = Property::where('slug', $slug)->firstOrFail();
        $data = WebsiteData::getOptions();
        $seoTitle = $data['title'];
        $seoDescription = $data['description'];
        $options = $data['options'];
        $date = $hotel->locDate();

        $phoneNumAdmin = Property::phoneFormat($data['options']['website_phone'] ?? '');
        $phoneNumLandlord = Property::phoneFormat($hotel->getCurrentOption('landlordPhoneNumber'));

        //$phoneTrack = new RoiStatService;
        //$phoneNumLandlord = $phoneTrack->getPhone($phoneNumLandlord);

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

        return view('single', compact('options', 'hotel', 'questions', 'reviews', 'phoneNumAdmin', 'phoneNumLandlord', 'seoTitle', 'seoDescription', 'phoneHide', 'date'));
    }

    /**
     * Shows single page with restricted access
     *
     * @param Request $request
     * @param $slug
     * @return View
     */
    public function singlePropertyAccess(Request $request, $slug): View
    {
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

    /**
     * Shows favorites page
     *
     * @return View
     */
    public function favorites(): View
    {
        $data = WebsiteData::getOptions();
        $seoTitle = $data['title'];
        $seoDescription = $data['description'];
        $options = $data['options'];

        $phoneNumAdmin = Property::phoneFormat($data['options']['website_phone'] ?? '');

        return view('favorites', compact('options', 'seoTitle', 'seoDescription', 'phoneNumAdmin'));
    }

    /**
     * Shows plans page
     * ToDo: ensure we need this, as plans were moved to Vue-handled template
     *
     * @return View
     */
    public function plans(): View
    {
        $data = WebsiteData::getOptions();
        $seoTitle = $data['title'];
        $seoDescription = $data['description'];
        $options = $data['options'];

        $phoneNumAdmin = Property::phoneFormat($data['options']['website_phone'] ?? '');
        return view('plans', compact('options', 'seoTitle', 'seoDescription', 'phoneNumAdmin'));
    }

    /**
     * Shows property request page
     *
     * @return View
     */
    public function propertyRequest(): View
    {
        $data = WebsiteData::getOptions();
        $seoTitle = $data['title'];
        $seoDescription = $data['description'];
        $options = $data['options'];

        $phoneNumAdmin = Property::phoneFormat($data['options']['website_phone'] ?? '');
        return view('property-request', compact('options', 'seoTitle', 'seoDescription', 'phoneNumAdmin'));
    }

    /**
     * Shows feedback page
     * @param $code
     * @return View
     */
    public function rate($code): View
    {
        $data = WebsiteData::getOptions();
        $seoTitle = $data['title'];
        $seoDescription = $data['description'];
        $options = $data['options'];

        $phoneNumAdmin = Property::phoneFormat($data['options']['website_phone'] ?? '');
        return view('rate', compact('options', 'seoTitle', 'seoDescription', 'phoneNumAdmin', 'code'));
    }

    /**
     * Shows registration page
     *
     * @return View
     */
    public function registration(): View
    {
        $data = WebsiteData::getOptions();
        $seoTitle = $data['title'];
        $seoDescription = $data['description'];
        $options = $data['options'];

        $phoneNumAdmin = Property::phoneFormat($data['options']['website_phone'] ?? '');
        return view('registration', compact('options', 'seoTitle', 'seoDescription', 'phoneNumAdmin'));
    }

    /**
     * Redirects to home page
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect(): RedirectResponse
    {
        return response()->redirectToRoute(app('locale')->routeApply('home'));
    }

    /**
     * Send roistat data
     * ToDo: check if we need that
     *
     * @param $data
     */
    public function roistatSend($data) {
        $roistatData = array(
            'roistat' => isset($_COOKIE['roistat_visit']) ? $_COOKIE['roistat_visit'] : 'nocookie',
            'key' => 'Yzc5MTY2Y2UyNmE4ZDdkNjM4YWI0OGFhNzNlMmFiZjk6MTg0Nzg4',
            'title' => ($data['name'] ?? '').' - '.($data['telephone'] ?? '').' - '.date('Y-m-d'),
            'comment' => $data['message'] ?? '',
            'name' => $data['name'] ?? '', // Имя клиента
            'email' => $data['email'] ?? '', // Email клиента
            'phone' => $data['telephone'] ?? '', // Номер телефона клиента
            'order_creation_method' => 'website-form', // Способ создания сделки (необязательный параметр). Укажите то значение, которое затем должно отображаться в аналитике в группировке "Способ создания заявки"
            'is_need_callback' => '0',
            'callback_phone' => '',
            'sync' => '0',
            'is_need_check_order_in_processing' => '1',
            'is_need_check_order_in_processing_append' => '1',
            'is_skip_sending' => '0', // Не отправлять заявку в CRM.
            'fields'  => array(
                'company.name' => $data['company'] ?? '',
                'contact.name' => $data['name'] ?? '',
                '500281' => $data['arrival-date'] ?? '',
                '490395' => $data['date-departure'] ?? '',
                '586761' => $data['number-persons'] ?? '',
                '585571' => request()->headers->get('referer'),
                'language' => $data['language'] ?? '',
                'type' => $data['type'] ?? '',
                'email-checkbox' => $data['email-checkbox'] ?? '',
                'consent-checkbox' => $data['consent-checkbox'] ?? '',
                'property' => $data['property'] ?? '',
                "charset" => "Windows-1251", // Сервер преобразует значения полей из указанной кодировки в UTF-8.
            ),
        );

	    file_get_contents("https://cloud.roistat.com/api/proxy/1.0/leads/add?" . http_build_query($roistatData));

    }

    /**
     * Processes property request form
     *
     * @param InquiryFormRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function inquiryForm(InquiryFormRequest $request): JsonResponse
    {

        $data = $request->all();
        if (true || $this->checkRecaptha($data['grecaptcha'])) {
            $property = Property::find($data['property']) ?: null;

            $notificationEmail = env('MAIL_NOTIFICATION_ADDRESS', '');
            if ($notificationEmail) {
                $data['arrival-date'] = implode('-', array_reverse(explode('/', $data['arrival-date'])));
                $data['date-departure'] = implode('-', array_reverse(explode('/', $data['date-departure'])));
                $data['arrival-date'] = date('Y-m-d', strtotime($data['arrival-date']));
                $data['date-departure'] = date('Y-m-d', strtotime($data['date-departure']));
                $data['date-inquiry'] = date('Y-m-d', strtotime($data['date-departure']));
                Mail::to($notificationEmail)->send(new InquiryHotel($property, $data));
                if ($data['email-checkbox'] ?? '') {
                    Mail::to($data['email'])->send(new InquiryHotel($property, $data));
                }
            }
            $this->roistatSend($data);
            return response()->json(['code' => 'ok']);
        } else {
            return response()->json(['code' => 'error']);
        }
    }

    /**
     * Shows single page
     *
     * @param $page
     * @return View
     */
    public function singlePage($page): View
    {
        $data = WebsiteData::getOptions();
        $seoTitle = $data['title'];
        $seoDescription = $data['description'];
        $options = $data['options'];
        $page = Page::where('slug', $page)->first();
        $phoneNumAdmin = Property::phoneFormat($data['options']['website_phone'] ?? '');
        return view('page', compact('page', 'seoDescription', 'seoTitle', 'options', 'phoneNumAdmin'));
    }

    /**
     * Checks Google Recaptcha data to filter spam
     * @param $response
     * @return bool
     */
    public function checkRecaptha($response): bool
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

    /**
     * Returns appropriate subdomain URL
     *
     * @param Request $request
     * @param GeocoderService $service
     * @return JsonResponse
     */
    public function getUrlForRedirectOnSubdomain(Request $request, GeocoderService $service): JsonResponse
    {
        $data = $request->all();
        $address = $data['address'];
        $km = $data['km'] ? $data['km'] : 10;

        $geo_data = $service->getCoords($address);

        $objects = Property::where(Property::raw('abs(' . $geo_data['lat'] . ' - lat) * 111'), '<', $km)
            ->where(Property::raw('abs(' . $geo_data['lng'] . ' - lng) * 111'), '<', $km);
        $firstElement = $objects->get()->first();
        if ($firstElement != null) {
            $city = $objects->get()->first()->city;
            $subdomain = Domain::where('city', $city)->first()->subdomain;
            if ($subdomain) {
                return response()->json(['code' => 'ok', 'redirectUrl' => ($request->secure() ? 'https://' : 'http://') . $subdomain . '.' . $request->getHttpHost()]);
            }
        }
        return response()->json(['code' => 'error']);
    }

}
