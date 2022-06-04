<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CustomerProfiles extends Model
{
    use HasFactory;
    use SoftDeletes;

      protected $table = 'customer_profiles';

      protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'about',
        'image',
        'phone',
        'housenumber',
        'addressline1',
        'addressline2',
        'city',
        'state',
        'postcode',
        'country',
        'profile_visibility'
    ];

     protected $dates = ['deleted_at'];
}
