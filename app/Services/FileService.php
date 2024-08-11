<?php

namespace App\Services;
use Illuminate\Support\Facades\File;

class FileService
{
    public function deleteFileFromPublicStorage(string $filePath)
    {
        if (File::exists($filePath)) {
            File::delete($filePath);
        }
    }
}
