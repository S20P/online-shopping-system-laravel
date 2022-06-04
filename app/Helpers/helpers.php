<?php

use App\Models\Settings;

function generalSetting($field){
    $setting = '';
    $settingData = Settings::select('setting_info')->first();
	    if($settingData){
	       $setting = $settingData->setting_info[$field];
	    }
    return $setting;
}

