<?php

use Illuminate\Database\Seeder;
use App\RoomType;

class RoomTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
             [
                 'picture' => '/svg/i-house-filled.svg',
                 'name' => 'дом (целиком)',
                 'persons' => 10,
                 'subtypes' => [
                     [
                         'picture' => '/svg/i-one.svg',
                         'name' => 'одноместный',
                         'persons' => 1
                     ],
                     [
                         'picture' => '/svg/i-two.svg',
                         'name' => 'двухместный',
                         'persons' => 2
                     ],
                     [
                         'picture' => '/svg/i-multi.svg',
                         'name' => 'многоместный',
                         'persons' => 5
                     ],
                ],
             ],
             [
                 'picture' => '/svg/i-house-filled.svg',
                 'name' => 'квартира',
                 'persons' => 5,
                 'subtypes' => [
                     [
                         'picture' => '/svg/i-two.svg',
                         'name' => 'двухместный',
                         'persons' => 2
                     ],
                     [
                         'picture' => '/svg/i-multi.svg',
                         'name' => 'трехместный',
                         'persons' => 3
                     ],
                 ],
             ],
             [
                 'picture' => '/svg/i-hotel-filled.svg',
                 'name' => 'гостиница',
                 'persons' => 100,
                 'subtypes' => [
                     [
                         'picture' => '/svg/i-one.svg',
                         'name' => 'одноместный',
                         'persons' => 1
                     ],
                     [
                         'picture' => '/svg/i-two.svg',
                         'name' => 'двухместный',
                         'persons' => 2
                     ],
                     [
                         'picture' => '/svg/i-multi.svg',
                         'name' => 'трехместный',
                         'persons' => 3
                     ],
                     [
                         'picture' => '/svg/i-multi.svg',
                         'name' => 'четырехместный',
                         'persons' => 4
                     ],
                 ]
            ]
            ];
        foreach ($types as $key => $data) {
            $parent = new RoomType;
            $parent['room_type_id'] = 0;
            $subtype = $data['subtypes'];
            unset($data['subtypes']);
            $parent->fill($data);
            $parent->save();
            foreach ($subtype as $subtype) {
                $subtype['room_type_id'] = $parent->id;
                $type = new RoomType;
                $type->fill($subtype);
                $type->save();
            }
        }
    }
}
