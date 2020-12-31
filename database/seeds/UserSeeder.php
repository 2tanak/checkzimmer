<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->fill([
            'name' => 'Max Sharlaev',
            'email' => 'max@sharlaev.com',
            'password' => Hash::make('dddddddd'),
        ]);
        $user->save();
    }
}
