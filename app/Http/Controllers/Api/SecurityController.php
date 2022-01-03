<?php

namespace App\Http\Controllers\Api;

use App\User;
use Cookie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use JWTAuth;
use Lang;

class SecurityController extends Controller
{
	private $token;

	private $user;

	public function __construct()
	{
		$this->token = JWTAuth::getToken();
		$this->user = JWTAuth::toUser($this->token);
		if (!$this->token) {
			return response()->json(['error' => 'login_error'], 403);
		}
	}

	public function change_password(Request $request)
	{
		$data = $request->all();
		$validator = $this->validator($data);
		if ($validator->fails()) {
			$view = view('partials.validator.errors')->with(['error' => $validator->errors()])->render();
			return response()->json([
				'view' => $view,
				'status' => 'error'
			], 200);
		};

		$this->user->password = bcrypt($request->password);
		$this->user->save();

		return response()->json(['status' => 'success'], 200)->header('Authorization', $this->token);
	}

	protected function validator(array $data)
	{

		$messages = [
			'password.required' => Lang::get('validation.custom.password.required'),
			'password.confirmed' => Lang::get('validation.custom.password.confirmed'),
			'password.min' => Lang::get('validation.custom.password.min'),

		];
		return \Validator::make($data, [
			'password' => 'required|string|min:6|confirmed',
		], $messages);
	}
}
