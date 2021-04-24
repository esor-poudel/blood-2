<?php

use Illuminate\Database\Seeder;
use App\City;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        City::create([
            'name'=>'maitidebi',
            'district_id'=> 1,

        ]);
         
        City::create([
            'name'=>'baneshwor',
            'district_id'=> 1,

        ]);
        City::create([
            'name'=>'kausaltar',
            'district_id'=> 2,

        ]);
        City::create([
            'name'=>'lokanthali',
            'district_id'=> 2,

        ]);
        City::create([
            'name'=>'jaulakhel',
            'district_id'=> 3,

        ]);
        City::create([
            'name'=>'ekantakuna',
            'district_id'=> 3,

        ]);
        
    }
}
