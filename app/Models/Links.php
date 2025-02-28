<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    protected $fillable = ['url'];

    public function qrcode()
    {
        return $this->belongsTo(Qrcode::class);
    }
    
}
