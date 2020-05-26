<?php

use Illuminate\Database\Seeder;
use App\User;
use Hash;

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
    }
}
