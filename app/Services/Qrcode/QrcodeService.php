<?php

namespace App\Services;

use App\Repositories\Qrcode\QrcodeRepository;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class QrcodeService
{
    public function __construct(protected QrcodeRepository $repository) {}

    public function getAllQrcodes()
    {
        return $this->repository->all();
    }

    public function getQrcodeById($id)
    {
        return $this->repository->find($id);
    }

    public function createQrcode(array $data)
    {
        $qrcode = $this->repository->create($data);

        if (!empty($data['images'])) {
            foreach ($data['images'] as $image) {
                $path = Storage::put('qrcode_images', $image);
                $qrcode->images()->create(['path' => $path]);
            }
        }

        return $qrcode;
    }

    public function updateQrcode($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deleteQrcode($id)
    {
        return $this->repository->delete($id);
    }
}
