<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    function uploadvideo($file)
    {
        $file_extension = $file->getClientOriginalExtension();
        
            $file_name = time() . '.' . $file_extension;
            $path = '../storage/app/public/videos';
            $file->move($path,$file_name);
            return $file_name;
    }
    function add($id,$file)
    {
        $addFile = Video::create([
            'video_name' => $file,
            'lesson_id' => $id
        ]);
        if($addFile){
            return true;
        }else{
            return false;
        }
    }
    
}
