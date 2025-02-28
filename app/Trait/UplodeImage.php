<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait ImageUploadTrait
{
    /**
     * رفع الصورة
     */
    public function uploadImage(UploadedFile $image, string $path): string
    {
        return $image->store($path, 'public');
    }

    /**
     * تحديث الصورة (يمسح القديمة ويرفع الجديدة)
     */
    public function updateImage(UploadedFile $newImage, ?string $oldImagePath, string $path): string
    {
        if ($oldImagePath && Storage::disk('public')->exists($oldImagePath)) {
            Storage::disk('public')->delete($oldImagePath);
        }

        return $this->uploadImage($newImage, $path);
    }

    /**
     * مسح الصورة
     */
    public function deleteImage(?string $imagePath): void
    {
        if ($imagePath && Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
    }
}
