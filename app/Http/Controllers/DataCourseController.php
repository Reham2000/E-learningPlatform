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
        if (is_null($id)) {
            $courses = Data_course::all();
            foreach ($courses as $course) {
                $chapters = Chapter::where('course_id', $course->id)->get();
                if (count($chapters) > 1) {
                    foreach ($chapters as $chapter) {
                        $chapter->image = public_path('images\chapters\\' . $chapter->image);
                        $chapter['lessons'] = Lesson::where('chapter_id', $chapter->id)->get();
                        $lessons = $chapter['lessons'];
                        foreach ($lessons as $lesson) {
                            $lesson->image = public_path('images\lessons\\' . $lesson->image);
                            $lesson['files'] = File::where('lesson_id', $lesson->id)->get();
                            foreach ($lesson['files'] as $file) {
                                $file->file_name =  storage_path("app\public\\files\\" . $file->file_name);
                            }
                            $lesson['videos']  = Video::where('lesson_id', $lesson->id)->get();
                            foreach ($lesson['videos'] as $file) {
                                $file->video_name =  storage_path("app\public\\videos\\" . $file->video_name);
                            }
                        }
                    }
                    if (count($chapter['lessons']) < 1) {
                        $chapter['lessons'] = "No Lessons";
                    }
                }

                $course['chapters'] = $chapters;
            }
            return response()->json([
                'status' => 200,
                'message' => "Course Data",
                'courseData' => $courses,
            ], 200);
        } else {
            if ($id) {
                $course = Data_course::find($id);

                $chapters = Chapter::where('course_id', $course->id)->get();
                if (count($chapters) > 1) {
                    foreach ($chapters as $chapter) {
                        $chapter->image = public_path('images\chapters\\' . $chapter->image);
                        $chapter['lessons'] = Lesson::where('chapter_id', $chapter->id)->get();
                        $lessons = $chapter['lessons'];
                        foreach ($lessons as $lesson) {
                            $lesson->image = public_path('images\lessons\\' . $lesson->image);
                            $lesson['files'] = File::where('lesson_id', $lesson->id)->get();
                            foreach ($lesson['files'] as $file) {
                                $file->file_name =  storage_path("app\public\\files\\" . $file->file_name);
                            }
                            $lesson['videos']  = Video::where('lesson_id', $lesson->id)->get();
                            foreach ($lesson['videos'] as $file) {
                                $file->video_name =  storage_path("app\public\\videos\\" . $file->video_name);
                            }
                        }
                    }

                    if (count($chapter['lessons']) < 1) {
                        $chapter['lessons'] = "No Lessons";
                    }
                }
                $course['chapters'] = $chapters;
                return response()->json([
                    'status' => 200,
                    'message' => "Course Data",
                    'courseData' => $course,
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "Course ID must Selected",
                ], 404);
            }
        }
    }

    public function getCourseData($id)
    {
        if ($id) {
            $course = Data_course::find($id);

            $chapters = Chapter::where('course_id', $course->id)->get();
            if (count($chapters) > 1) {
                foreach ($chapters as $chapter) {
                    $chapter['lessons'] = Lesson::where('chapter_id', $chapter->id)->get();
                    $lessons = $chapter['lessons'];
                    foreach ($lessons as $lesson) {
                        $lesson['files'] = File::where('lesson_id', $lesson->id)->get();
                        $lesson['videos']  = Video::where('lesson_id', $lesson->id)->get();
                    }
                }
                if (count($chapter['lessons']) < 1) {
                    $chapter['lessons'] = "No Lessons";
                }
            }
            $course['chapters'] = $chapters;

            return response()->json([
                'status' => 200,
                'message' => "Course Data",
                'courseData' => $course,
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "Course ID must Selected",
            ], 404);
        }
    }
    public function getCourseDataForInstruc($id)
    {
        if ($id) {
            $course = Data_course::find($id);

            $chapters = Chapter::where('course_id', $course->id)->get();
            if (count($chapters) > 1) {
                foreach ($chapters as $chapter) {
                    $chapter['lessons'] = Lesson::where('chapter_id', $chapter->id)->get();
                    $lessons = $chapter['lessons'];
                    foreach ($lessons as $lesson) {
                        $lesson['files'] = File::where('lesson_id', $lesson->id)->get();
                        $lesson['videos']  = Video::where('lesson_id', $lesson->id)->get();
                    }
                }
                if (count($chapter['lessons']) < 1) {
                    $chapter['lessons'] = "No Lessons";
                }
            }
            $course['chapters'] = $chapters;

            return view('instructor.courseData',compact('course'));


        } else {

            return view('instructor.courses');

        }
    }
}
