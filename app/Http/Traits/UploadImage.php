<?php
namespace APP\Http\Traits;

use Illuminate\Http\Request;

trait UploadImage {
    public function upload($file){
        $imagename=time().$file->getClientOriginalName();
//        $imagesize=$file->getClient->getSize();
        $file->move('uploads/categories',$imagename);
        $imagepath='uploads/categories/'.$imagename;

        return $imagepath;

    }
}
