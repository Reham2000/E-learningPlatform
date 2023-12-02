<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Course;
use App\Models\Data_course;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\DataCourseController;
use App\Models\File;
use App\Models\Video;
use App\Models\Lesson;
use App\Models\Chapter;

class InstructorController extends Controller
{
    public function getInstructor($id = NULL)
    {

        $data =  is_null($id) ?  Instructor::all() : Instructor::find($id) ;
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
    function edite($id)
    {
        $admin = Admin::find($id);
        $instructor = Instructor::where('admin_id',$id)->first();
        return view('instructor.edite',compact('instructor','admin'));
    }
    function update(Request $request,$id)
    {
        $request->validate([
            'brief' => 'required|min:2|max:1000',
            'qualification' => 'required|min:2|max:500',
            'image' => 'required',
        ]);

        
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
            $path = 'images/instructors';
        $instructor = Instructor::where('admin_id',$id)->first();
        if($instructor){
            $image_path = public_path('images/instructors/'.$instructor->image);
            $instructor->brief = $request->brief;
            $instructor->qualification = $request->qualification ;
            $instructor->image = $file_name;
            $instructor->num_of_published_couress = count(Course::where('admin_id',$id)->get());
            $instructor->save();

            if (file_exists($image_path)) {

                @unlink($image_path);

            }
        }else{
            $instructorData = Instructor::insert([
                'admin_id' => $id,
                'brief' => $request->brief,
                'qualification' => $request->qualification,
                'image' => $file_name,
                'num_of_published_couress' => 0,
            ]);
        }

        $request->image->move($path,$file_name);



        $admins = Admin::all();

        return view('instructor.instructors',compact('admins'));
    }
    function getMyCourses()
    {
        $courses = Data_course::where('admin_id',$_GET['id'])->get();
        return view('instructor.myCourses',compact('courses'));
    }

    function myCourseData($id)
    {

        $course = Data_course::find($id);
        $chapters = Chapter::where('course_id',$course->id)->get();
        
        if( count($chapters) > 0){
            foreach ($chapters as $chapter) {
                $lessonData = Lesson::where('chapter_id',$chapter->id)->get();
                $chapter['lessons'] = $lessonData;
                foreach ($chapter['lessons'] as $lesson) {
                    $lesson['files'] = File::where('lesson_id',$lesson->id)->get();
                    $lesson['videos'] = Video::where('lesson_id',$lesson->id)->get();

                }
            }
        }else{
            $chapters =[];
        }

        return view('instructor.courseData',compact('course','chapters'));




        // $dataCourse = new DataCourseController;
        // $courseData = $dataCourse->getCourseData($id);

        // // print_r($courseData);die;


        // $course = Data_course::find($id);

        // $chapters = Chapter::where('course_id', $course->id)->get();
        // if (count($chapters) > 1) {
        //     foreach ($chapters as $chapter) {
        //         $lessonData = Lesson::where('chapter_id', $chapter->id)->get();
        //         $chapter['lessons'] = $lessonData;
        //         $lessons = $chapter['lessons'];
        //         foreach ($lessons as $lesson) {
        //             $lesson['files'] = File::where('lesson_id', $lesson->id)->get();
        //             $lesson['videos']  = Video::where('lesson_id', $lesson->id)->get();
        //         }
        //     }
        //     if (count($chapter['lessons']) < 1) {
        //         $chapter['lessons'] = "No Lessons";
        //     }
        // }
        //     $course['chapters'] = $chapters[0];
        //     return view('instructor.courseData',compact('course'));





        // $course = Data_course::where('id',$id)->get();
        // return view('instructor.courseData',compact('course','courseData'));

    }
}
