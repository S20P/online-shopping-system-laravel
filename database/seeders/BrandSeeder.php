<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brands;
class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	if(Brands::count() <=0) {

	    	$brands = 
	              [
		            'name' => 'brand name2',
		            'description' => '',
		            'image' =>''               
	            	];

            Brands::create($brands);
        }
    }
}
