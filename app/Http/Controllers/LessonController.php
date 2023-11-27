<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Video;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function getLesson($id = NULL)
    {

        $data =  is_null($id) ?  Lesson::all() : Lesson::find($id) ;
        if(is_null($data))
        {
            return response()->json([
                'status' => 404,
                'message' => "no data found ",
            ]) ;
        }else{

        }
        return response()->json([
            'status' => 200,
            'message' => "OK!",
            'data' => $data
        ]) ;
    }
    function getLessonByChapterId($id)
    {
        $lessons = Lesson::where('chapter_id',$id)->get();
        foreach ($lessons as $lesson) {
            $lessons['files'] = File::where('lesson_id',$lesson->id)->get();
            $lessons['videos'] = Video::where('lesson_id',$lesson->id)->get();

        }
        if(count($lessons)){
            return response()->json([
                'status' => 200,
                'message' => "OK!",
                'lessons' => $lessons,

            ]) ;
        }
        return response()->json([
            'status' => 200,
            'message' => "No Lessons To Show",

        ]) ;
    }
}
