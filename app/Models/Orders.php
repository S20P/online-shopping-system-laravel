<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model
{
    use HasFactory;
    use SoftDeletes;

      protected $table = 'orders';

      protected $fillable = [
        'order_number', 'user_id', 'status', 'grand_total', 'item_count',
        'first_name', 'last_name', 'address', 'city','state', 'country', 'post_code', 'phone_number', 'notes'
     ];

    protected $dates = ['deleted_at'];

      public function user()
      {
          return $this->belongsTo(User::class, 'user_id');
      }

      public function items()
      {
          return $this->hasMany(OrderItem::class,'order_id');
      }
}
