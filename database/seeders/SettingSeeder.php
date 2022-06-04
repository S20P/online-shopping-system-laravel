<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Settings;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$setting_info = [
    		 "logo" => '/',
             "currency" => "INR",
             "currency_symbol" => "₹",             
    	];        
           
        $existSetting =  Settings::first();
          
        $setting = $existSetting ?  $existSetting : new Settings;
	    $setting->setting_info = $setting_info;		
		$setting->save(); 

    }
}
