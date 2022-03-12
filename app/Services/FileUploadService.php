<?php

namespace App\Services;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class FileUploadService
{
    public static function upload(Request $request, $fileNameToStore)
    {
        $request->file('image')->storeAs('public/products', $fileNameToStore);
        $request->file('image')->storeAs('public/products/thumbnail/small', $fileNameToStore);
        $request->file('image')->storeAs('public/products/thumbnail/medium', $fileNameToStore);

        //create small thumbnail
        $smallThumbnailPath = public_path('storage/products/thumbnail/small/' . $fileNameToStore);
        static::createThumbnail($smallThumbnailPath, 150, 93);

        //create medium thumbnail
        $mediumThumbnailPath = public_path('storage/products/thumbnail/medium/' . $fileNameToStore);
        static::createThumbnail($mediumThumbnailPath, 300, 185);
    }



    /**
     * Create a thumbnail of specified size
     *
     * @param string $path path of thumbnail
     * @param int $width
     * @param int $height
     */
    public static function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }
}
