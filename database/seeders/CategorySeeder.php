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
		            'name' => 'Category name2',
		            'description' => '',
		            'image' =>''	             
	    	];

         Category::create($categories);
     }
    }
}
