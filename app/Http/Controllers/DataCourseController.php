<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Video;
use App\Models\Lesson;
use App\Models\Chapter;
use App\Models\Data_course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataCourseController extends Controller
{
    public function getData_course($id = NULL)
    {
        if(is_null($id))
        {
            $data =Data_course::all();
            foreach($data as $item){
                $courses = Data_course::find($item->id);
                $courses['chapters'] = Chapter::where('course_id',$courses->id)->get();
                $courses['chapters']['lessons'] = Lesson::where('chapter_id',$courses['chapters'][0]->id)->get();
                $courses['chapters']['lessons']['files'] = File::where('lesson_id',$courses['chapters']['lessons']->id)->get();
                $courses['chapters']['lessons']['videos'] = Video::where('lesson_id',$courses['chapters']['lessons']->id)->get();
            }

        }else{
            $courses = Data_course::find($id);
            $courses['chapters'] = Chapter::where('course_id',$courses->id)->get();
            // $courses['chapters']['lessons'] = Lesson::where('chapter_id',$courses['chapters'][0]['id'])->first();
            // $courses['chapters'] = ['lessons' => $courses['lessons']];

            if(is_null($courses['chapters']) && ! is_array($courses['chapters'])){
                $courses['chapters'] = ['message' => 'No Chapters are Found'];
            }else if(is_array($courses['chapters'])){
                foreach ($courses['chapters'] as $chapter) {
                    $courses['chapters'][$chapter->id] = ['lessons' => "lessons here"];
                    // $chapter['lessons'] = Lesson::where('chapter_id',$chapter->id)->get();
                    // $courses['chapters']->chapter->id = ['lessons' => $chapter['lessons']];
                }
            }


            // foreach ($courses['chapters'] as $chapter) {
            //     // $courses['chapters']['lessons'] = Lesson::where('chapter_id',$chapter->id)->get();
            //     // $courseChapters['lessons'] = Lesson::where('chapter_id',$chapter->id)->get();
            //     // array_push($courseChapters[$chapter->id],$courseChapters['lessons']);

            // }
            // $courses['chapters']['lessons']['files'] = File::where('lesson_id',$courses['chapters']['lessons']->id)->get();
            // $courses['chapters']['lessons']['videos'] = Video::where('lesson_id',$courses['chapters']['lessons']->id)->get();
            return response()->json([
                'status' => 200,
                'message' => "OK!",
                'data' => $courses
            ]) ;
        }

        if($courses){
            return response()->json([
                'status' => 200,
                'message' => "OK!",
                'data' => $courses
            ]) ;
        }

        return response()->json([
                'status' => 404,
                'message' => "No data Found",
        ],404) ;
        // if(is_null($data))
        // {
        //     return response()->json([
        //         'status' => 404,
        //         'message' => "no data found ",
        //     ]) ;
        // }else{

        // }
        // return response()->json([
        //     'status' => 200,
        //     'message' => "OK!",
        //     'data' => $data
        // ]) ;
    }
    public function getCourseData($id)
    {

    }
}
