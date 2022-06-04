<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
   use HasFactory;

    protected $table = 'payments';

      protected $fillable = [
        'customer_id','customer_name','order_id','payment_id','payment_name','payment_method','payment_status','payment_date',
     ];


}
