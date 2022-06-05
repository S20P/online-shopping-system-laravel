<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\CustomerProfiles;

class CustomerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(User::count() <=0) {
          $user =  User::create([
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('12345678'),
                'status' => 'Active'
            ]);

            $profile = new CustomerProfiles;
            $profile->user_id  = $user->id;            
            $profile->first_name  = "Satish";
            $profile->last_name  = "Parmar";
            $profile->about  = "I am student of BCA in IGNOU";
            $profile->phone  = "7574945107";
            $profile->housenumber  ="103";
            $profile->addressline1  = "GokulDham Soc.";
            $profile->addressline2  = "Hirabug rod";
            $profile->city  = "Surat";
            $profile->state  = "Gujrat";
            $profile->postcode  = "395006";
            $profile->country  = "India";
            $profile->profile_visibility = 1;           
            $profile->save();   
    }
    }
}
