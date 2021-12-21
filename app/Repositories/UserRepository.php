<?php

namespace App\Repositories;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Class UserRepository
 * Repository for users
 *
 * @package App\Http\Repositories
 */

class UserRepository {
    /**
     * Register a user
     * @param $data
     * @return mixed
     */
    static function register($data) {
        $userEmail = $data['contact']['email'];
        $user = User::where('email', $userEmail)->first();
        if (!$user) {
            $user = User::create([
                'name' => $data['contact']['person']['name'],
                'email' => $userEmail,
                'role' => 'holder',
                'password' => Hash::make(Str::random(12))
                ]);
        }
        self::addMetaData($user, $data);
        return $user;
    }

    /**
     * Add user metadata
     * @param $user
     * @param $data
     */
    static function addMetaData($user, $data) {
		if(count($data['languages']) > 0){
		foreach ($data['languages'] as $lang=>$value) {
            if (!$value) {
                continue;
            }
            $languages[] = PropertyRepository::LANG_CODES[$lang];
        }
       
        $data['languages'] = implode('|', $languages);
		}
        foreach ($data as $row => $block) {
            if (!is_array($block)) {
                $user->metaUpdate($row, $block);
                continue;
            }
            foreach ($block as $key => $item) {
                if ($key == 'person') {
                    $lastName = $item['last_name'] ?? '';
                    $lastNameSeparator = $lastName ? ' ' : '';
                    $firstName = $item['first_name'] ?? $item['name'];
                    $item = ($item['addr'] ? $item['addr'] . ' ' : '') . $firstName . $lastNameSeparator . $lastName;
                }
                $user->metaUpdate("{$row}_{$key}", $item);
            }
        }
    }

}
