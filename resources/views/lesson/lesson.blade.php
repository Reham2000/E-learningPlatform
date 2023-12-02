@extends('admin.layout')

@section('title')
Lesson : {{$lesson->lesson_name}}
@endsection

@section('content')
{{-- {{dd($lesson['videos']->video_name)}} --}}
{{-- {{dd(storage_path("app\public\\videos\\". $lesson['videos']->video_name))}} --}}
<div class="container px-5">
    <div class="row justify-content-around">
        <div class="col-md-4 col-sm-12 shadow p-3">
            <h2 class="text-center text-bold text-primary mb-3"> {{$lesson->lesson_name}} </h2>
            <h5 class="text-bold text-primary">Description</h5>
            <p> {{$lesson->lesson_desc}} </p>
            <h5 class="text-bold text-primary">Uploaded at</h5>
            <p> {{$lesson->created_at}} </p>
            {{-- {{dd($lesson['files'])}} --}}
            @if(is_array($lesson['files']) && count($lesson['files']) > 1)
            @forelse ($lesson['files'] as $file )
            <a href="{{route('fileDownload',$file->id)}}">{{$file->file_name}}</a>
            @empty
            @endforelse
            @else
            <a href="{{route('fileDownload',$lesson['files']->id)}}">{{$lesson['files']->file_name}}</a>

            @endif


        </div>
        <div class="col-md-7 col-sm-12">
            {{-- <video width="100%" height="340" controls>
                <source src="{{storage_path("app\public\\videos\\". $lesson['videos']->video_name)}}" type="video/mp4">
                Your browser does not support the video tag.
            </video> --}}
            <video controls src="{{storage_path("app\public\\videos\\". $lesson['videos']->video_name)}}"></video>
        </div>
    </div>
    <a href="{{route('lesson.back',$lesson->chapter_id)}}" class="btn btn-secondary m-5">Back</a>
</div>


@endsection
