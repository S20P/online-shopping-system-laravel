<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Products extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
         'brand_id',         
         'sku', 
         'name',
         'slug',
         'description', 
         'stock',
         'price',
         'sale_price',
         'status',
         'featured',
         'image' 
    ];

     protected $dates = ['deleted_at'];

     protected $casts = [
        'brand_id'  => 'integer',
        'quantity'  =>  'integer',
        'status'    =>  'boolean',
        'featured'  =>  'boolean'
    ];


    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function brand()
    {
        return $this->belongsTo(Brands::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImages::class,'product_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories','product_id','category_id');
    }
}
