<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Models\CustomerProfiles;
use Exception;
use App\Http\Requests\EditUserProfileRequest;

class ProfileController extends Controller
{
      public function getProfile()
	   {

	            $user = Auth::user();  
	            $profile = CustomerProfiles::where('user_id',$user->id)->first();          
		
		   	    return view('user.pages.profile', compact('profile'));
	   }

      public function updateProfile(EditUserProfileRequest $request ){

              $user = Auth::user();

              $input = $request->all();

              $profileExist = CustomerProfiles::where('user_id',$user->id)->first();

              $profile = $profileExist ? $profileExist : new CustomerProfiles;
              $profile->user_id  = $user->id;
	 		
		    if($request->file('image')){
	            $file= $request->file('image');
	            $filename= date('YmdHi').$file->getClientOriginalName();
	            $file->move(public_path('images/users'), $filename);           
	            $profile->image = $filename;
	        }
        
            $profile->first_name  = $input['first_name'];
            $profile->last_name  = $input['last_name'];
            $profile->about  = $input['about'];
            $profile->phone  = $input['phone'];
            $profile->housenumber  = $input['housenumber'];
            $profile->addressline1  = $input['addressline1'];
            $profile->addressline2  = $input['addressline2'];
            $profile->city  = $input['city'];
            $profile->state  = $input['state'];
            $profile->postcode  = $input['postcode'];
            $profile->country  = $input['country'];
            $profile->profile_visibility = 1; 
           
		        $profile->save();  	

	     return redirect()->route('user.profile')
			->with('success','Profile saved successfully');

      }

}
