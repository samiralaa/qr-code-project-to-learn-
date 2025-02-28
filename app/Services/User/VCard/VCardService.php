<?php

namespace App\Services\User\VCard;

use App\Trait\Crud;
use App\Models\User;
use App\Models\Vcard;
use App\Repositories\Vcard\VcardRepository;

class VCardService
{
    protected $repository;

    public function __construct(VcardRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllVcards()
    {
        return $this->repository->all();
    }

    public function getVcardById($id)
    {
        return $this->repository->find($id);
    }

    public function createVcard($data)
    {
        return $this->repository->create($data);
    }

    public function updateVcard($id, $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deleteVcard($id)
    {
        return $this->repository->delete($id);
    }
}
