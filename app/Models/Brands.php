<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brands extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'brands';

    protected $fillable = ['name','description','image'];

    protected $dates = ['deleted_at'];

 }
