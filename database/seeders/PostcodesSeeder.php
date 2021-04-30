<?php

namespace Database\Seeders;

use App\Postcode;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;


class PostcodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $files = Storage::disk('local')->allFiles('postcodes');

        foreach ($files as $file) {
            $postcodes = json_decode(Storage::disk('local')->get($file), true);

            foreach ($postcodes as $postcode) {
                (new Postcode)->fill(['city' => $postcode['place'], 'code' => $postcode['zipcode'], 'latitude' => $postcode['latitude'], 'longitude' => $postcode['longitude']])->save();
            }
        }
    }
}
