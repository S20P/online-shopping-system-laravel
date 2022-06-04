<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
   use HasFactory;
   use SoftDeletes;

    protected $table = 'payments';

      protected $fillable = [
        'customer_id','customer_name','order_id','payment_id','payment_name','payment_method','payment_status','payment_date',
     ];

    protected $dates = ['deleted_at'];


}
