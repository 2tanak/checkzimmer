<?php

use Illuminate\Database\Seeder;
use App\Feature;
use App\FeatureCategory;

class FeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cats = [
            'Кухня' => [
                [ 'picture' => '/svg/i-own-kitchen.svg', 'name' => 'Eigene kuche' ],
                [ 'picture' => '/svg/i-shared-kitchen.svg', 'name' => 'Gemeinschaftskuche' ],
                [ 'picture' => '/svg/i-fridge.svg', 'name' => 'Kuchlshrank' ],
                [ 'picture' => '/svg/i-coffee-machine.svg', 'name' => 'Kaffemaschine' ],
                [ 'picture' => '/svg/i-microwave-oven.svg', 'name' => 'Mikrowelle' ],
                [ 'picture' => '/svg/i-dishwasher.svg', 'name' => 'Spulmaschine' ],
            ],
            'Ванная' => [
                [ 'picture' => '/svg/i-bath.svg', 'name' => 'Badewanne' ],
                [ 'picture' => '/svg/i-bath.svg', 'name' => 'Gemeinschafstbad' ],
                [ 'picture' => '/svg/i-towel.svg', 'name' => 'Handtuscher inkl.' ],
                [ 'picture' => '/svg/i-no-towel.svg', 'name' => 'Handtuscher nicht verf.' ],
                [ 'picture' => '/svg/sauna.svg', 'name' => 'Sauna' ],
                [ 'picture' => '/svg/i-hair-dryer.svg', 'name' => 'Fon' ],
                [ 'picture' => '/svg/i-toilet.svg', 'name' => 'Personlich toilette' ],
                [ 'picture' => '/svg/i-shared-toilet.svg', 'name' => 'Gemeinsame toilette' ],
                [ 'picture' => '/svg/i-washingmachine.svg', 'name' => 'Waschmaschine' ],
                [ 'picture' => '/svg/i-own-shower.svg', 'name' => 'Deinee dusche' ],
                [ 'picture' => '/svg/i-shared-shower.svg', 'name' => 'Gemeinschaftsdusche' ],
            ],
            'Комната' => [
                [ 'picture' => '/svg/i-signlebed.svg', 'name' => 'Einzelbett' ],
                [ 'picture' => '/svg/i-combined-bed.svg', 'name' => 'Getrente betten' ],
                [ 'picture' => '/svg/i-extra-bed.svg', 'name' => 'Zustellbett' ],
                [ 'picture' => '/svg/i-double-bed.svg', 'name' => 'Doppelbett' ],
                [ 'picture' => '/svg/i-linens.svg', 'name' => 'Bettwasche inkl.' ],
                [ 'picture' => '/svg/i-no-linens.svg', 'name' => 'Bettwasche nicht verf.' ],
                [ 'picture' => '/svg/i-restroom.svg', 'name' => 'Gemeinschafrsraum' ],
                [ 'picture' => '/svg/i-radio.svg', 'name' => 'Radio' ],
                [ 'picture' => '/svg/i-safe.svg', 'name' => 'Spind/Safe' ],
                [ 'picture' => '/svg/i-darts.svg', 'name' => 'Dart' ],
                [ 'picture' => '/svg/i-tv.svg', 'name' => 'TV' ],
                [ 'picture' => '/svg/i-table-billiard.svg', 'name' => 'Billiartisch' ],
                [ 'picture' => '/svg/i-balcony.svg', 'name' => 'Balkon' ],
                [ 'picture' => '/svg/i-air-conditioning.svg', 'name' => 'Kimaanlage' ],
                [ 'picture' => '/svg/i-fireplace.svg', 'name' => 'Kamin' ],
                [ 'picture' => '/svg/i-computer-place.svg', 'name' => 'Platz fur computer' ],
            ],
            'Прочее' => [
                [ 'picture' => '/svg/i-dryer.svg', 'name' => 'Trockenschrank' ],
                [ 'picture' => '/svg/i-friendly.svg', 'name' => 'Familienfreundlich' ],
                [ 'picture' => '/svg/i-gym.svg', 'name' => 'Fitness' ],
                [ 'picture' => '/svg/i-pets-friendly.svg', 'name' => 'Haustier' ],
                [ 'picture' => '/svg/i-wifi.svg', 'name' => 'WiFi' ],
                [ 'picture' => '/svg/i-iron.svg', 'name' => 'Bugeleisen zum Bugeln' ],
                [ 'picture' => '/svg/i-jacuzi.svg', 'name' => 'Whirpool' ],
                [ 'picture' => '/svg/i-table-soccer.svg', 'name' => 'Tisch-futba' ],
                [ 'picture' => '/svg/i-smoking.svg', 'name' => 'Raucher' ],
                [ 'picture' => '/svg/i-no-smoking.svg', 'name' => 'Nicht rauchen' ],
            ],
            'Снаружи' => [
                [ 'picture' => '/svg/i-terrace.svg', 'name' => 'Terrace' ],
                [ 'picture' => '/svg/i-parking.svg', 'name' => 'Offentliche parkzplatz' ],
                [ 'picture' => '/svg/i-car-parking.svg', 'name' => 'PKW-Parkzplatz' ],
                [ 'picture' => '/svg/i-truck-parking.svg', 'name' => 'LKW-Parkzplatz' ],
                [ 'picture' => '/svg/i-swimming-pool.svg', 'name' => 'Schwimmbad' ],
                [ 'picture' => '/svg/i-garden.svg', 'name' => 'Wintergarten' ],
                [ 'picture' => '/svg/garden.svg', 'name' => 'Garten' ],
                [ 'picture' => '/svg/i-disabled.svg', 'name' => 'Barrierefrei' ],
                [ 'picture' => '/svg/i-barbecue.svg', 'name' => 'Grillmoglichkeit' ],
                [ 'picture' => '/svg/i-bike.svg', 'name' => 'Fahhradelveih' ],
                [ 'picture' => '/svg/i-elevator.svg', 'name' => 'Heben' ],

            ]
        ];
        foreach ($cats as $key => $cat) {
            $fc = FeatureCategory::where('name', $key)->first();
            foreach ($cat as $i => $item) {
                $item['feature_category_id'] = $fc->id;
                $item['ord'] = $i+1;
                $feature = new Feature;
                $feature->fill($item);
                $feature->save();
            }
        }
    }
}
