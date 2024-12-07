<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageHelper
{
    public static function FileUploadHelper(Request $request, $fieldName, $destinationPath, $existingImage = null)
    {
        if ($request->hasFile($fieldName)) {
            // Delete the existing image if it exists
            if ($existingImage) {
                $existingImagePath = public_path($destinationPath) . '/' . $existingImage;
                if (File::exists($existingImagePath)) {
                    File::delete($existingImagePath);
                }
            }

            // Upload the new image
            $image = $request->file($fieldName);
            $otp = rand(1000000000, 9999999999);
            $imageName = $otp . '-' . time() . '.' . $image->extension();
            $image->move(public_path($destinationPath), $imageName);

            return $imageName;
        }

        return null;
    }
}


// $path = ImageHelper::FileUploadHelper($request,'photo_front',env('USER_PHOTO_PATH'));
