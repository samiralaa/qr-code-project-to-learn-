<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qrcode extends Model
{

    protected $fillable = [ 'image_path', 'qr_link'];

    public function vcard()
    {
        return $this->belongsTo(Vcard::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
