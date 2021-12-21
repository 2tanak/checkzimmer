<?php

namespace App\Http\Controllers\Api;

use App\Repositories\PropertyRepository;
use App\User;
use Cookie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Property;
use JWTAuth;





class AdvertController extends Controller
{

	public function index()
	{

		$token = JWTAuth::getToken();
		$user = JWTAuth::toUser($token);
		if (!$token) {
			return response()->json(['error' => 'login_error'], 403);
		}
		return response()->json(Property::where('user_id', '=', $user->id)->get());
	}


	public function show(Request $request, Property $property)
	{
		$token = JWTAuth::getToken();
		$user = JWTAuth::toUser($token);

		if (!$token && !$property->id) {
			return response()->json(['error' => 'login_error'], 403);
		}
		$array_keys = [];
		if ($property->options->count() > 0) {
			$key = $property->options->pluck('value', 'key');
		}

		if ($property->rooms->count() > 0) {
			//вычисляем propertyType(объект с комнатами)
			$grouped = $property->rooms->groupBy(function ($item, $key) {
				return $item->roomType->name;
			});
			$property_type = [];

			foreach ($grouped as $k => $value) {
				$prices = $value->sum(function ($item) {
					return $item->price;
				});
				$persons = $value->sum(function ($item) {
					return $item->person;
				});
				$number = $value->sum(function ($item) {
					return $item->number;
				});
				$value->transform(function ($item) {
					$obj['id'] = $item->id;
					$obj['room_type_id'] = $item->room_type_id;
					$obj['persons'] = $item->person;
					$obj['num'] = $item->number;
					$obj['price'] = $item->price;
					$obj['name'] = '';
					unset($item);
					$item = collect($obj);
					return $item;
				});


				$property_type[$k]['name'] = $k;
				$property_type[$k]['num'] = $number;
				$property_type[$k]['persons'] = $persons;
				$property_type[$k]['price'] = $prices;
				$property_type[$k]['rooms'] = $value;
			}
			$property_type = collect($property_type)->values();
		} else {
			$property_type[0]['name'] = 'Wohnung';
			$property_type[0]['num'] = 9;
			$property_type[0]['persons'] = 18;
			$property_type[0]['price'] = 10;
			$property_type[0]['rooms'] = [];
		}


		if ($property->address) {
			$value_address = explode(' ', $property->address);

			$key_address = ['street', 'house'];
			$key_address = collect($key_address);

			$combined = $key_address->combine($value_address);
		}
		if ($property->features->count() > 0) {
			$facilities = $property->features->pluck('id');
		} else {
			$facilities = [];
		}
		$array_keys['plan'] = $user->options->where('key', 'plan')->first()->value;
		$array_keys['post']['address']['city'] = isset($property->city) ? $property->city : '';
		$array_keys['post']['address']['country'] = '';
		$array_keys['post']['address']['house'] = isset($combined['house']) ? $combined['house'] : '';
		$array_keys['post']['address']['postcode'] = isset($property->zip) ? $property->zip : '';
		$array_keys['post']['address']['street'] = isset($combined['street']) ? $combined['street'] : '';

		$array_keys['property']['contact']['email'] = isset($key['landlordClientEmail']) ? $key['landlordClientEmail'] : '';
		$array_keys['property']['contact']['email_display'] = '';
		$array_keys['property']['contact']['person']['name'] = isset($key['landlordName']) ? $key['landlordName'] : '';
		if (isset($key['landlordAddr'])) {
			$array_keys['property']['contact']['person']['addr'] = $key['landlordAddr'] ? $key['landlordAddr'] : '';
		} else {
			$array_keys['property']['contact']['person']['addr'] = '';
		}
		$array_keys['property']['contact']['phone'] = isset($key['landlordPhoneNumber']) ? $key['landlordPhoneNumber'] : '';
		$array_keys['property']['contact']['phone_display'] = isset($key['landlordHidePhone']) ? $key['landlordHidePhone'] : '';
		$array_keys['property']['contact']['phoneAdditional'] = '';
		$array_keys['property']['contact']['phoneAdditional_display'] = '';
		$array_keys['property']['contact']['phoneAdditional_whatsapp'] = '';
		$array_keys['property']['contact']['phoneStat'] = '';
		$array_keys['property']['contact']['phoneStat_display'] = '';
		$array_keys['property']['contact']['phone_fax'] = '';
		$array_keys['property']['contact']['phone_fax_enable'] = '';
		$array_keys['property']['contact']['phone_whatsapp'] = '';
		$array_keys['property']['contact']['website'] = '';
		$array_keys['property']['contact']['website_enable'] = '';
		$array_keys['property']['facilities'] = $facilities;
		//$array_keys['property']['languages'] = $key['landlordSpeaks'] ? collect($lang) : '';
		$array_keys['property']['media']['photos'] = isset($key['photos']) ? json_decode($key['photos']) : [];
		$array_keys['property']['media']['facebook'] = isset($key['facebook']) ? $key['facebook'] : '';
		$array_keys['property']['media']['video'] = isset($key['video']) ? $key['video'] : '';
		$array_keys['property']['media']['video'] = isset($key['video']) ? $key['video'] : '';
		$array_keys['property']['propertyTypes'] = $property_type;
		//return 300;


		return $array_keys;
	}



	public function update(Request $request, Property $property)
	{

		$token = JWTAuth::getToken();
		$user = JWTAuth::toUser($token);
		if (!$token) {
			return response()->json(['error' => 'login_error'], 403);
		}

		$data = $request->all();

		$propertyData = $data['property'];
		$propertyData['address'] = $data['post']['address'];
		$propertyData['languages'] = $data['languages'];


		$property = PropertyRepository::update($propertyData, $property, $user->id);
		return $property;
	}

	public function destroy(Property $property)
	{
		$token = JWTAuth::getToken();
		$user = JWTAuth::toUser($token);
		if (!$token) {
			return response()->json(['error' => 'login_error'], 403);
		}
		if ($property->rooms()->count() > 0) {
			$property->rooms()->delete();
		}
		if ($property->options()->count() > 0) {
			$property->options()->delete();
		}
		if ($property->features()->count() > 0) {
			$property->features()->detach();
		}
		$property->delete();
		return response()->json(['status' => 'success'], 200);
	}
	public function store(Request $request)
	{
	}
}
