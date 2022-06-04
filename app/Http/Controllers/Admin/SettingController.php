<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use Exception;
class SettingController extends Controller
{
      public function edit(Request $request)
	{
		try{
		    $setting = Settings::first();  

		    return view('admin.pages.settings.edit', compact('setting'));

	     }catch(Exception $e){
	     	return response()->json([
         		"success" => false,
         		"errors" => $e->getMessage()
         	]);
	     }
	}

	public function update(Request $request)
	{
	    
	    $input = $request->all();

        $setting_info = $input['setting_info'];

	    $setting = Settings::find($input['id']);
		
	    if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images/setting'), $filename);           
            $setting_info['logo'] = '/images/setting/'.$filename;
        }

        $setting->setting_info = $setting_info;

		$setting->save();  
	

     return redirect()->route('admin.settings.edit')
		->with('success','Settings saved successfully');
	   
	}
}
