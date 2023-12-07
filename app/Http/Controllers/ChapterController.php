<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function getChapter($id = NULL)
    {

        $data =  is_null($id) ?  Chapter::all() : Chapter::find($id) ;
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
    function add($id)
    {
        return view('chapter.add',compact('id'));
    }
    function create(Request $request,$id)
    {

        $request->validate([
            'chapter_title' => 'required|min:2|max:100',
            'required_time' => 'required|numeric',
        ]);
        if($request->image){
            $file_extension = $request->image->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'images/chapters';
            $admin = Chapter::create([
                'chapter_title' => $request->chapter_title,
                'required_time' => $request->required_time,
                'course_id' => $id,
                'image' => $file_name,
            ]);
            $request->image->move($path,$file_name);

        }else{
            $admin = Chapter::create([
                'chapter_title' => $request->chapter_title,
                'required_time' => $request->required_time,
                'course_id' => $id,
            ]);

        }


        // $courses = Course::find($id);
        // $id = $courses->id;
        $instruct = new InstructorController;
        return  $instruct->myCourseData(session()->get('id'),$id);

    }
}
