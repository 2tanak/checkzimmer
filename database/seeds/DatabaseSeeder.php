<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FeaturesCategoriesSeeder::class);
        $this->call(FeaturesSeeder::class);
        $this->call(RoomTypesSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
