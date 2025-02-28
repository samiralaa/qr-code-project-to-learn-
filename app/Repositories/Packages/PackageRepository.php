<?php

namespace App\Repositories\Packages; // هذا هو المسار الصحيح للـ repository

use App\Models\Package;
use App\Repositories\BaseRepository\BaseRepository; // تأكد من أن هذا الاستيراد صحيح

class PackageRepository extends BaseRepository
{
    public function __construct(Package $model)
    {
        parent::__construct($model);
    }
}
