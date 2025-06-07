<?php

namespace App;

use Storage;

trait HasCloudinary
{
    public function cloudinarySingleUpload($file, string $path)
    {

        $path = Storage::disk('cloudinary')->putFile($path, $file);
        return $this->cloudinaryGetUrl($path);

    }

    public function cloudinaryBatchUpload($files, $path)
    {

        $path = collect($files)->map(function ($file) use ($path) {
            return $this->cloudinarySingleUpload($file, $path);
        });

        return $path;
    }

    private function cloudinaryGetUrl(string $path)
    {
        return Storage::url($path);
    }
}
