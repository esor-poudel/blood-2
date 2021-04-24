<?php

use Illuminate\Database\Seeder;
use App\District;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        District::create([
            'id'=>'1',
            'name'=>'kathmandu',

        ]);
    
        District::create([
            'id'=>'2',
            'name'=>'bhaktapur',
                            
        ]);
        
        District::create([
            'id'=>'3',
            'name'=>'lalitpur',
                            
        ]);
    }
}
