<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fruit extends Model
{
    protected $table = 'fruits';
    protected $fillable = [
        'name',
        'category',
        'price',
        'stock_quantity',
        'description',
        'availability',
    ];

}
