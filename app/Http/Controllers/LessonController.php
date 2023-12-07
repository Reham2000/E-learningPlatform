<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Video;
use App\Models\Lesson;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Data_course;
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
    function back($id)
    {
        $courses = Data_course::where('admin_id',session()->get('id'))->get();
        return view('instructor.myCourses',compact('courses'));
    }
    function shoawLesson($id)
    {
        $lesson = Lesson::find($id);
        $lesson['videos'] = Video::where('lesson_id',$id)->get();
        $lesson['files'] = File::where('lesson_id',$id)->get();
        $lesson['videos'] = $lesson['videos'][0];
        $lesson['files'] = $lesson['files'][0];
        return view('lesson.lesson',compact('lesson'));
    }
    function add($id)
    {
        return view('lesson.add',compact('id'));
    }
    function create(Request $request,$id)
    {
        $file = new FileController;
        $video = new VideoController;
        $request->validate([
            'lesson_name' => 'required|min:2|max:100',
            'lesson_desc' => 'required|min:20|max:1000',
            'image' => 'image|mimes:png,jpg',
            'file' => 'required|mimes:pdf,doc,docx,ppt,pptx',
            'video' => 'required|mimes:mp4,mov,wmv,avi',

        ]);
        if($request->image){
            $file_extension = $request->image->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'images/lessons';
            $admin = Lesson::create([
                'lesson_name' => $request->lesson_name,
                'lesson_desc' => $request->lesson_desc,
                'chapter_id' => $id,
                'image' => $file_name,
            ]);
            $request->image->move($path,$file_name);

        }else{
            $admin = Lesson::create([
                'lesson_name' => $request->lesson_name,
                'lesson_desc' => $request->lesson_desc,
                'chapter_id' => $id,
            ]);

        }
        $lesson = Lesson::where('lesson_name',$request->lesson_name)->where('chapter_id',$id)->first();
        $file_name = $file->uploadFile($request->file);
        if(! $file->add($lesson->id,$file_name))
        {
            $error = "File not add ";
            return view('lesson.add',compact('error'));
        }
        $video_name = $video->uploadvideo($request->video);
        if(! $video->add($lesson->id,$video_name))
        {
            $error = "Video not add ";
            return view('lesson.add',compact('error'));
        }
        $chapter = Chapter::find($id);
        $courses = Course::find($chapter->course_id);
        $id = $courses->id;
        $instruct = new InstructorController;
        return  $instruct->myCourseData(session()->get('id'),$id);
    }
}
