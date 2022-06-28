<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class UploadGoogleHelper
{

    public static function upload($contentDataFile,$name)
    {
        $disk = Storage::disk('gcs');
        $disk->put($name,$contentDataFile);
        return [
            'path' => "/$name",
            'url' => "https://storage.googleapis.com/".config('filesystems.disks.gcs.bucket')."/$name"
        ];
    }
}
