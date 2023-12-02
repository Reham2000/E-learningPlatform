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
            <h3 class="text-primary">{{$course->course_title}}</h3>
            <p>Description : {{$course->course_brief}}</p>
            <p> Price : {{$course->course_price}} $</p>
            <p>Category : {{$course->category_name}}</p>
            <p>Instructor : {{$course->instractor_name}}</p>
            <a href="{{route('instructor.courseData',$course->id)}}" class="btn btn-primary">Go To Course <i class="fas fa-arrow-right px-2"></i></a>
        </div>
        @endforeach
    </div>
</div>


@endsection