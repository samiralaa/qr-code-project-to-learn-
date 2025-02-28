<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['name', 'price', 'description', 'features'];
    protected $casts = [
        'price' => 'float',
        'features' => 'array',
        'description' => 'array',
        'name'=>'array'
    ];

    
}
