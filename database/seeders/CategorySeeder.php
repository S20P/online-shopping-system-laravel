<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	if(Category::count() <=0) {
    		
	        $categories = [ 
                        [
                        'name' => 'Charger',
                        'description' => 'Mobiles & Accessories',
                        'image' =>''               
                        ],
                        [
                        'name' => 'Covers',
                        'description' => 'Mobiles & Accessories',
                        'image' =>''               
                        ],
                        [
                        'name' => 'Data Cables',
                        'description' => 'Mobiles & Accessories',
                        'image' =>''               
                        ],
                         [
                        'name' => 'Power Bank',
                        'description' => 'Mobiles & Accessories',
                        'image' =>''               
                        ],
                        [
                        'name' => 'Screen Gards',
                        'description' => 'Mobiles & Accessories',
                        'image' =>''               
                        ]
                ];

         foreach ($categories as $key => $value) {
                   Category::create($value);
                }
     }
    }
}
