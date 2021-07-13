<?php

namespace App\Http\Controllers\Api;

use App\Feature;
use App\Notifications\InquiryHotel;
use App\Notifications\InquiryRegistration;
use App\Repositories\PropertyRepository;
use App\Repositories\UserRepository;
use App\User;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function register(Request $request)
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

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if ($token = $this->guard()->attempt($credentials)) {
            return response()->json(['status' => 'success'], 200)->header('Authorization', $token)
                ->withCookie(cookie('authDone', true));
        }
        return response()->json(['error' => 'login_error'], 401);
    }

    public function logout()
    {
        $this->guard()->logout();
        $cookie = Cookie::forget('authDone');
        return response()->json([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200)->withCookie($cookie);
    }

    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);
        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }

    public function refresh()
    {
        if ($token = $this->guard()->refresh()) {
            return response()
                ->json(['status' => 'successs'], 200)
                ->header('Authorization', $token);
        }
        return response()->json(['error' => 'refresh_token_error'], 401);
    }

    private function guard()
    {
        return Auth::guard();
    }
    public function registrationProcess(Request $request) {
        $data = $request->all();
        $registerData = [
            'plan' => $data['plan'],
            'post' => $data['post'],
            'billing' => $data['billing'],
            'profile' => $data['contact'],
            'contact' => $data['contact']
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
