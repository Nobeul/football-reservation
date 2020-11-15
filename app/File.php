<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    public static function uploadImage($objectType = null, $objectId = null, $fileName = null, $updateId = null)
    {
        if ($updateId == null) {
            $file = new File;
            $file->object_type = $objectType;
            $file->object_id = $objectId;
            $file->file_name = $fileName;
            $file->save();
        } else {
            $file = File::where(['object_type' => $objectType, 'object_id' => $objectId])->first();
            if ($file != null) {
                Storage::delete('/public/profile-images/'.$file->file_name);
                $file->object_type = $objectType;
                $file->object_id = $objectId;
                $file->file_name = $fileName;
                $file->save();
            }
        }
    }
}
