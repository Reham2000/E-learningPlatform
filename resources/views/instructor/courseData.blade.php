@extends('admin.layout')

@section('title')
My Course
@endsection

@section('content')
{{-- {{dd($course)}} --}}
<div class="container px-5">
    <div class="row ">
        <div class="col-md-5 col-sm-12 shadow-lg p-5 text-center rounded mb-4">
            <h3 class="text-primary text-bold text-capitalize">{{$course->course_title}}</h3>
            <span class="text-muted">{{$course->course_brief}}</span>
            <h4 class="py-3 text-bold"> {{$course->course_price}} $</h4>
            <p>Category : <span class="text-bold text-capitalize">{{$course->category_name}}</span></p>
            <p>Instructor :  <span class="text-bold text-capitalize text-primary">{{$course->instractor_name}}</span></p>
            @php
                $id = session()->get('id');
                $course_id = $course->id;
            @endphp
        </div>
        <div class="col-md-7 col-sm-12 p-4 rounded mb-4 justify-content-around">
            <div class="row">
                <div class="col-6">
                    <h4 class="text-bold text-primary">Chapters</h4>
                </div>
                <div class="col-6">
                    <a href="{{route('chapter.add',$course->id)}}" class="btn btn-primary mb-3">Add Chapter</a>

                </div>
            </div>


            @php($i = 1)
            @php($j = 1)

            @forelse ($chapters as $chapter)
                <div class="w-100 shadow mb-3 p-3 row">
                    <div class="col-6">
                        <h5 class="text-bold"> {{$i .' - ' .$chapter->chapter_title}} </h5>
                    <p>Required Time : {{$chapter->required_time}} </p>
                    </div>
                    <div class="col-6">
                        <a href="{{route('lesson.add',$chapter->id)}}" class="btn btn-primary mb-3">Add Lesson</a>
                    </div>
                    @forelse ($chapter->lessons as $lesson )
                        <div class="shadow py-1 px-3 mb-2 col-12">
                            <p><a href="{{route('lesson.lesson',$lesson->id)}}" class="nav-link">{{$j}} -  {{$lesson->lesson_name}} </a></p>
                        </div>
            @php($j++)

                    @empty
                    <div class="shadow py-1 px-3 col-12">
                        <p class="nav-link text-danger">No Lessons</p>
                    </div>
                    @endforelse
                </div>
                @php($i++)
                @empty
                    <h3>NO Chapters Found</h3>
                @endforelse
                {{-- <h3 class="text-success">{{$course['course_title']}}</h3>
                <p>Description : {{$course->course_brief}}</p>
                <p> Price : {{$course->course_price}} $</p>
                <p>Category : {{$course->category_name}}</p>
                <p>Instructor : {{$course->instractor_name}}</p> --}}


        </div>

        {{-- @endforeach --}}
    </div>
</div>


@endsection
