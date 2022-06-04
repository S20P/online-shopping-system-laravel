<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678'),
            'status' => 'Active'
        ]);
    }
    }
}
