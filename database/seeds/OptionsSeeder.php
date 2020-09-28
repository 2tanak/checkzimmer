<?php

use App\Option;
use Illuminate\Database\Seeder;
use App\RoomType;

class OptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = [
            ['parent' => 0, 'type' => 'system', 'key' => 'motto_header', 'value' => '4 быстрых шага к жилью в городе Leipzig'],
            ['parent' => 0, 'type' => 'system', 'key' => 'website_phone', 'value' => '+49 341 1234 2223'],
            ['parent' => 0, 'type' => 'system', 'key' => 'copyright', 'value' => 'Copyright &year; Immobilien.de LLC All rights reserved.'],
        ];
        foreach ($options as $key => $option) {
            $opt = new Option();
            $opt->fill($option);
            $opt->save();
        }
    }
}
