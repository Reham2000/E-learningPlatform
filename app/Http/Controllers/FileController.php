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
    function download($id)
    {

            $file = File::find($id);
            $myFile = storage_path("app\public\\files\\". $file->file_name);
            if(file_exists($myFile)){
                return response()->download($myFile);
            }else{
                $id = session()->get('id');
            return redirect()->route('instructor.courses',compact('id'));

            }


    }
    function uploadImage($image)
    {
        $file_extension = $image->getClientOriginalExtension();

            $file_name = time() . '.' . $file_extension;
            $path = 'images/instructors';
            $image->move($path,$file_name);
            return $file_name;


    }

    function uploadFile($file)
    {
        $file_extension = $file->getClientOriginalExtension();

            $file_name = time() . '.' . $file_extension;
            $path = '../storage/app/public/files';
            $file->move($path,$file_name);
            return $file_name;

    }
    function add($id,$file)
    {
        $addFile = File::create([
            'file_name' => $file,
            'lesson_id' => $id
        ]);
        if($addFile){
            return true;
        }else{
            return false;
        }
    }
}
