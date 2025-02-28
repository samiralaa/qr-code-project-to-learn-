<?php

namespace App\Repositories\Vcard;

use App\Models\Vcard;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class VcardRepository
{
    public function all()
    {
        return Vcard::all();
    }

    public function find($id)
    {
        return Vcard::findOrFail($id);
    }

    public function create(array $data)
    {
        // Handle image upload
        if (!empty($data['image'])) {
            $data['image'] = Storage::put('vcards', $data['image']);
        }

        // Create vCard
        $vcard = Vcard::create($data);

        // Generate QR Code


        return $vcard;
    }

    public function update($id, array $data)
    {
        $vcard = Vcard::findOrFail($id);

        if (!empty($data['image'])) {
            Storage::delete($vcard->image);
            $data['image'] = Storage::put('vcards', $data['image']);
        }

        $vcard->update($data);
        return $vcard;
    }

    public function delete($id)
    {
        return Vcard::destroy($id);
    }
}
