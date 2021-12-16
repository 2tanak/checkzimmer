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
}
