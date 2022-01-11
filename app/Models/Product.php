<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'slug', 'picture', 'name', 'short_description', 'content', 'date', 'status'
    ];
}
