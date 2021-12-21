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
use Hash;
/**
 * Class AuthController
 * Works with website authentication
 *
 * @package App\Http\Controllers\Api
 */

class AuthController extends Controller
{
    /**
     * Performs registration procedures
     * Handles POST request with new user data
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request): JsonResponse
    {
        $v = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|confirmed',
        ]);
        if ($v->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }
        $user = new User;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json(['status' => 'success'], 200);
    }

    /**
     * Login mechanics
     * Handles POST request with login data
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
		$user = User::where(['email' => $request->email])->whereIn('role', ['admin','holder'])->first();
	    $role = $user->role;
		
		if (!$user){
            return response()->json(['error' => 'error']);
		}
		if (!Hash::check($request->password, $user->password)){
		    return response()->json(['error' => 'error']);
		}
		
        $credentials = $request->only('email', 'password');
        if ($token = $this->guard()->attempt($credentials)) {
            return response()->json(['status' => 'success','role'=>$role], 200)->header('Authorization', $token)
                ->withCookie(cookie('authDone', true));
        }
        return response()->json(['error' => 'login_error'], 401);
    }

    /**
     * Logout mechanics
     * Handles POST request for logout
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $this->guard()->logout();
        $cookie = Cookie::forget('authDone');
        return response()->json([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200)->withCookie($cookie);
    }

    /**
     * Getting user data
     * Handles POST request with user data
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function user(Request $request): JsonResponse
    {
        $user = User::find(Auth::user()->id);
        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }

    /**
     * Refreshes user auth data
     *
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        if ($token = $this->guard()->refresh()) {
            return response()
                ->json(['status' => 'successs'], 200)
                ->header('Authorization', $token);
        }
        return response()->json(['error' => 'refresh_token_error'], 401);
    }

    /**
     * Returns auth guard
     *
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    private function guard()
    {
        return Auth::guard();
    }

    /**
     * User registration mechanics
     * Handles POST request with user and property data
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function registrationProcess(Request $request): JsonResponse {
        $data = $request->all();
        $registerData = [
            'plan' => $data['plan'],
            'post' => $data['post'],
            'billing' => $data['billing'],
            'profile' => $data['contact'],
            'contact' => $data['contact'],
			'languages' => $data['languages']
        ];

        $user = UserRepository::register($registerData);

        $propertyData = $data['property'];
        $propertyData['address'] = $data['post']['address'];
        $propertyData['languages'] = $data['languages'];

        $property = PropertyRepository::create($user->id, $propertyData);
        PropertyRepository::optionAdd($property, 'applicationOrigin', json_encode($property));

        $features = Feature::whereIn('id', $data['property']['facilities'])->get();
        $data['property']['features'] = $features;
        $data['domain'] = $request->getSchemeAndHttpHost();

        $notificationEmail = env('MAIL_NOTIFICATION_ADDRESS', '');
        $notificationEmailDev = env('MAIL_NOTIFICATION_DEV_ADDRESS', 'maxsharlaev@gmail.com');

        Mail::to($notificationEmail)->send(new InquiryRegistration($data));
        Mail::to($notificationEmailDev)->send(new InquiryRegistration($data));
        return response()->json(['code' => 'ok']);
    }

}
