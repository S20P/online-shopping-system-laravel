<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategories extends Model
{
    use HasFactory;
    use SoftDeletes;

     protected $table = 'product_categories';

      protected $fillable = [
        'category_id',
        'product_id'       
    ];

    protected $casts = [
        'product_id'    =>  'integer',
    ];

     protected $dates = ['deleted_at'];
}
