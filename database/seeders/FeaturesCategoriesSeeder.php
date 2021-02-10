<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\FeatureCategory;

class FeaturesCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cats = [__('Kitchen'), __('Bathroom'), __('Room'), __('Other'), __('Outside')];
        foreach ($cats as $i => $cat) {
            $fc = new FeatureCategory;
            $fc->fill(
                ['name' => $cat,
                'ord' => $i+1,
                'lang' => 'ru',]);
            $fc->save();
        }
    }
}
