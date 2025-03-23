<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vcard extends Model
{
    protected $fillable = [
        'user_id', 'name', 'last_name', 'phone_number', 'email',
        'company', 'address1', 'address2', 'social_links',
        'qrcode_id'
    ];

    protected $casts = [
        'social_links' => 'json',
    ];

    public function qrcode(): BelongsTo
    {
        return $this->belongsTo(Qrcode::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
