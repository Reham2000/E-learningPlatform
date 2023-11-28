<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    function downloadFile($id)
    {
        if($id)
        {
            $file = File::find($id);
            $myFile = storage_path("app\public\\files\\". $file->file_name);
            if(file_exists($myFile)){
                return response()->download($myFile);
            }else{
            return response()->json(['status' => 404,'message' => "File not found",'file'=>$myFile],404);

            }
        }else{
            return response()->json(['status' => 404,'message' => "set file id first"],404);
        }

    }
}
