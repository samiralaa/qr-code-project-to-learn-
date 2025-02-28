<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vcard extends Model
{
    protected $fillable = [
        'name', 'last_name', 'phone_number', 'email',
        'company', 'address1', 'address2', 'social_links',
        'qrcode_id'
    ];

    protected $casts = [
        'social_links' => 'json',
    ];

    public function qrcode()
    {
        return $this->belongsTo(Qrcode::class);
    }
}
