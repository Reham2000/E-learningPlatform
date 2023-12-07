<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use App\Models\Data_course;
use App\Models\Instructor;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function getCourse($id = NULL)
    {

        $data =  is_null($id) ?  Course::all() : Course::find($id) ;
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
    function search($name)
    {
        return Course::where("course_title","like","%".$name."%")->get();
    }
    function add($id)
    {
        $categories = Category::all();
        return view('course.add',compact('id','categories'));
    }
    function create(Request $request,$id)
    {

        $request->validate([
            'course_title' => 'required|min:2|max:100',
            'course_brief' => 'required|min:2|max:1000',
            'course_price' => 'required|numeric',
            'category_id' => 'required',
        ]);
        $admin = Course::create([
            'course_title' => $request->course_title,
            'course_brief' => $request->course_brief,
            'course_price' => $request->course_price,
            'category_id' => $request->category_id,
            'admin_id' => $id,
        ]);
        $instructor = Instructor::find($id);
        $instructor->num_of_published_couress = (int) $instructor->num_of_published_couress  + 1;
        $instructor->save();
        $instruct = new InstructorController;
        $course = Course::where('course_title',$request->course_title)->where('course_price',$request->course_price)->where('admin_id',$id)->first();
        return  $instruct->myCourseData($id,$course->id);

    }
    function getCourses()
    {
        $courses = Course::all();
        return view('course.courses',compact('courses'));
    }
    function block($id)
    {
        $course = Course::find($id);
        if($course->blocked == '0')
        {
            $course->blocked = '1';
        }else{
            $course->blocked = '0';
        }
        $course->save();

        $courses = Course::all();
        return redirect()->route('course.courses',compact('courses'));



    }
}
