<?php

namespace App\Http\Controllers\Api;

use App\Feature;
use App\Notifications\InquiryHotel;
use App\Notifications\InquiryRegistration;
use App\Repositories\PropertyRepository;
use App\Repositories\UserRepository;
use App\User;
use Cookie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use JWTAuth;


class ProfileController extends Controller
{
	private $token;
	public function __construct()
	{

		$this->token = JWTAuth::getToken();
		if (!$this->token) {
			return response()->json(['error' => 'login_error'], 403);
		}
	}



	public function Index()
	{



		$user = JWTAuth::toUser($this->token);


		foreach ($user->options as $option) {

			if (!strpos($option->key, '_', 0)) {
				$options[$option->key] = $option->value;
				continue;
			}
			$patterns = "/[_]/";
			$replace = "sep";
			$k = preg_replace($patterns, $replace, $option->key, 1);
			$arr_key = explode('sep', $k);



			$options[$arr_key[0]][$arr_key[1]] = json_decode($option->value);
			if (empty($options[$arr_key[0]][$arr_key[1]])) {
				$options[$arr_key[0]][$arr_key[1]] = $option->value;
			}
		}
		return $options;
	}
}
