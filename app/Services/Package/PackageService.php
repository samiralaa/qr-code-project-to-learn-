<?php

namespace App\Services\Package;

use App\Repositories\Packages\PackageRepository;




class PackageService
{
    protected $packageRepository;

    public function __construct(PackageRepository $packageRepository)
    {
        $this->packageRepository = $packageRepository;
    }

    public function getAllPackages()
    {
        return $this->packageRepository->getAll();
    }

    public function getPackageById($id)
    {
        return $this->packageRepository->getById($id);
    }

    public function createPackage(array $data)
    {
        return $this->packageRepository->create($data);
    }

    public function updatePackage($id, array $data)
    {
        return $this->packageRepository->update($id, $data);
    }

    public function deletePackage($id)
    {
        return $this->packageRepository->delete($id);
    }
}
