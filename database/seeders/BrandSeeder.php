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

	    	$brands = [ 
    	                [
    		            'name' => 'Redmi',
    		            'description' => 'Mobiles & Accessories',
    		            'image' =>''               
    	            	],
                        [
                        'name' => 'boAt',
                        'description' => 'Mobiles & Accessories',
                        'image' =>''               
                        ],
                        [
                        'name' => 'OnePlus',
                        'description' => 'Mobiles & Accessories',
                        'image' =>''               
                        ],
                         [
                        'name' => 'realme',
                        'description' => 'Mobiles & Accessories',
                        'image' =>''               
                        ],
                        [
                        'name' => 'Samsung',
                        'description' => 'Mobiles & Accessories',
                        'image' =>''               
                        ]
                ];

                foreach ($brands as $key => $value) {
                   Brands::create($value);
                }

            
        }
    }
}
