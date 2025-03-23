<?php

namespace App\Services\Dashboard\User;

class UserDashboardService
{

    public $model;
    
    public function __construct(\App\Models\User $model)
    {
        $this->model = $model;
    }
    public function getUserQrcode()
    {
        $userId = auth()->id();

        $user = $this->model->find($userId);

        if ($user) {
            $qrCode = $user->getQrCode();
            return $qrCode;
        }
        return null;
    }
}

//
