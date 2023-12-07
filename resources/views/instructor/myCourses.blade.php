@extends('admin.layout')

@section('title')
My Courses
@endsection

@section('content')
@php
$id = session()->get('id');
@endphp
<div class="container px-5">
    <a href="{{route('course.add',$id)}}" class="btn btn-primary mb-5">Add Course <i class="fas fa-plus"></i></a>
    <div class="row justify-content-around">
        @foreach($courses as $course)
        <div class="col-md-5 col-sm-11 shadow border  p-4 text-center rounded mb-4">
            <h3 class="text-primary text-bold text-capitalize">{{$course->course_title}}</h3>
            <span class="text-muted">{{$course->course_brief}}</span>
            <h4 class="py-3 text-bold"> {{$course->course_price}} $</h4>
            <p>Category : <span class="text-bold text-capitalize">{{$course->category_name}}</span></p>
            <p>Instructor :  <span class="text-bold text-capitalize text-primary">{{$course->instractor_name}}</span></p>
            @php
                $id = session()->get('id');
                $course_id = $course->id;
            @endphp
            <a href="{{route('instructor.courseData',compact('id','course_id'))}}" class="btn btn-primary">Go To Course <i class="fas fa-arrow-right px-2"></i></a>
        </div>
        @endforeach
    </div>
</div>


@endsection
