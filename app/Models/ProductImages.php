<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImages extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'product_images';

    protected $fillable = ['product_id', 'image'];

    protected $casts = [
        'product_id'    =>  'integer',
    ];

    protected $dates = ['deleted_at'];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
