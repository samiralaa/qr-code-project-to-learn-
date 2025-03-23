<?php

namespace App\Services\User\VCard;

use App\DTOs\VCardDTO;
use App\Traits\ResponseApi;
use App\Traits\ImageUploadTrait;
use App\Repositories\Vcard\VcardRepository;

class VCardService
{
    use ImageUploadTrait, ResponseApi;

    protected $repository;

    public function __construct(VcardRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllVcards($userId)
    {
        return $this->successResponse($this->repository->getAllByUserId($userId));
    }

    public function getVcardById($id, $userId)
    {
        $vcard = $this->repository->findById($id, $userId);
        if (!$vcard) return $this->errorResponse(null, 404, 'VCard not found');

        return $this->successResponse($vcard);
    }

    public function createVcard(VCardDTO $dto)
    {
        $data = $dto->toArray();
        if (isset($data['image_path'])) {
            $data['image_path'] = $this->uploadImage($data['image_path'], 'vcards');
        }
        return $this->successResponse($this->repository->create($data), 201, 'VCard created');
    }
}
