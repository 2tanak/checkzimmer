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

	private $user;

	public function __construct()
	{
		$this->token = JWTAuth::getToken();
		$this->user = JWTAuth::toUser($this->token);
		if (!$this->token) {
			return response()->json(['error' => 'login_error'], 403);
		}
	}



	public function Index(Request $request)
	{

		$user = $this->user;
		$options_user= $user->options;
		
if($request->page == 'tarif'){
	return $options_user->where('key', 'plan')->first()->value;
	}
		foreach ($options_user as $option) {

			if (!strpos($option->key, '_', 0)) {
				$options[$option->key] = $option->value;
				continue;
			}

			$patterns = "/[_]/";
			$replace = "sep";
			$k = preg_replace($patterns, $replace, $option->key, 1);
			$arr_key = explode('sep', $k);


			if (in_array('person', $arr_key)) {
				if ($option->key == 'post_person') {
					$value_person = explode(' ', $option->value);
					$key_person = ['addr', 'first_name', 'last_name'];
					$key_person = collect($key_person);
					$combined = $key_person->combine($value_person);
					$option->value = $combined;
				}
				if ($option->key == 'billing_person') {
					$value_person = explode(' ', $option->value);
					$key_person = ['addr', 'first_name', 'last_name'];
					$key_person = collect($key_person);
					$combined = $key_person->combine($value_person);
					$option->value = $combined;
				}
			}


			$options[$arr_key[0]][$arr_key[1]] = json_decode($option->value);

			if (empty($options[$arr_key[0]][$arr_key[1]])) {

				if ($option->key == 'contact_person') {
					$options[$arr_key[0]][$arr_key[1]]['name'] = $option->value;
				} else {
					if ($option->value) {
						$options[$arr_key[0]][$arr_key[1]] = $option->value;
					}
				}
			}
		}
		if (isset($options['languages'])) {
           
			//вычисляем языки
			$arr = [
				'en' => 'english',
				'ge' => 'german',
				'pl' => 'poland',
				'ru' => 'russian',
			];
			$languages = explode('|', $option->value);
			$lang = [];
			foreach ($arr as $k => $val) {
				if (in_array($k, $languages)) {
					$lang[$val] = true;
				} else {
					$lang[$val] = false;
				}
			}
			$options['languages'] = collect($lang);
		}
		return $options;
	}

	public function updatePersonal(Request $request)
	{
		$data = $request->all();

		$user = $this->user;
		$registerData = [
			'plan' => $data['plan'],
			'post' => $data['post'],
			'billing' => $data['billing'],
			'profile' => $data['contact'],
			'contact' => $data['contact'],
			'languages' => $data['languages'],
		];

		try {
			if(count($data['languages']) > 0){
			foreach ($registerData['languages'] as $lang => $value) {
				if (!$value) {
					continue;
				}
				$languages[] = PropertyRepository::LANG_CODES[$lang];
			}

			$registerData['languages'] = implode('|', $languages);
            }
			foreach ($registerData as $row => $block) {

				if (!is_array($block)) {
					$user->metaUpdate($row, $block);
					continue;
				}

				foreach ($block as $key => $item) {

					if ($key == 'person') {
						if ($row == 'contact' || $row == 'profile') {
							//so that there are no errors, we skip, because there are no such keys
						} else {
							$lastName = $item['last_name'] ?? '';
							$lastNameSeparator = $lastName ? ' ' : '';
							$firstName = $item['first_name'] ?? $item['name'];
							$item = ($item['addr'] ? $item['addr'] . ' ' : '') . $firstName . $lastNameSeparator . $lastName;
						}
					}
					$user->metaUpdate("{$row}_{$key}", $item);
				}
			}
			return response()->json(['status' => 'success'], 200)->header('Authorization', $this->token);
		} catch (\Exception $e) {
		}
	}
	
	public function changeTarif(Request $request){
		$optionsData = [
            'value'  => $request->plan,
        ];
		$this->user->options()->updateOrCreate(['key'=>'plan'],$optionsData);
        return response()->json(['status' => 'success'], 200)->header('Authorization', $this->token)->withCookie(cookie('authDone', true));
		
	}
}
