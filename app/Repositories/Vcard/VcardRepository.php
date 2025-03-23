<?php

namespace App\Repositories\Vcard;

use App\Models\Vcard;

class VcardRepository
{
    public function getAllByUserId($userId)
    {
        return Vcard::where('user_id', $userId)->get();
    }

    public function findById($id, $userId)
    {
        return Vcard::where('id', $id)->where('user_id', $userId)->first();
    }

    public function create(array $data)
    {
        return Vcard::create($data);
    }

    public function update($id, $userId, array $data)
    {
        return Vcard::where('id', $id)->where('user_id', $userId)->update($data);
    }

    public function delete($id, $userId)
    {
        return Vcard::where('id', $id)->where('user_id', $userId)->delete();
    }
}
