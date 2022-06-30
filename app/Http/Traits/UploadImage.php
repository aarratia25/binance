<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;
use Image;

trait UploadImage
{
    static function uploadImage($file, $disk)
    {
        $image = Image::make($file);

        $filename = time() . '.' . $file->getClientOriginalExtension();

        Storage::disk($disk)->put($filename, $image->stream());

        return $filename;
    }
}
