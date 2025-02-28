<?php

namespace App\Repositories\Qrcode;

use App\Models\Qrcode;

class QrcodeRepository
{
    public function all()
    {
        return Qrcode::with('images')->get();
    }

    public function find($id)
    {
        return Qrcode::with('images')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Qrcode::create($data);
    }

    public function update($id, array $data)
    {
        $qrcode = Qrcode::findOrFail($id);
        $qrcode->update($data);
        return $qrcode;
    }

    public function delete($id)
    {
        return Qrcode::destroy($id);
    }
}

//
