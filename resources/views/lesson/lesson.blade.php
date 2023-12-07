@extends('admin.layout')

@section('title')
Lesson : {{$lesson->lesson_name}}
@endsection

@section('content')
{{-- {{dd($lesson['videos']->video_name)}} --}}
{{-- {{dd(storage_path("app\public\\videos\\". $lesson['videos']->video_name))}} --}}
<div class="container px-5">
    <div class="row justify-content-around">
        <div class="col-md-4 col-sm-12 shadow p-3 row">
            <div class="col-12">
                <img src="{{asset('images/lessons/'.$lesson->image??'default.png')}}" alt="lesson photo">
            </div>
            <div class="col-12">
                <h2 class="text-center text-bold text-primary mb-3"> {{$lesson->lesson_name}} </h2>
            <h5 class="text-bold text-primary">Description</h5>
            <p> {{$lesson->lesson_desc}} </p>
            <p class="text-bold text-primary">Uploaded at <span class="text-muted px-3"> {{$lesson->created_at}} </span></p>

            {{-- {{dd($lesson['files'])}} --}}
            @if(is_array($lesson['files']) && count($lesson['files']) > 1)
                <ul>
                    @forelse ($lesson['files'] as $file )
                    <li><a href="{{route('fileDownload',$file->id)}}">{{$file->file_name}}</a></li>
                    @empty
                    <li>No Files</li>
                    @endforelse
                </ul>
            @else
            
            <a href="{{route('fileDownload',$lesson['files']->id)}}">{{$lesson['files']->file_name}}</a>

            @endif
            </div>
{{-- {{dd(asset('/storage/app/public/videos/'. $lesson['videos']->video_name))}} --}}

        </div>
        <div class="col-md-7 col-sm-12">
            <video controls width="100%" src="{{asset('/storage/app/public/videos/'. $lesson['videos']->video_name)}}"></video>
        </div>
    </div>
    <a href="{{route('lesson.back',$lesson->chapter_id)}}" class="btn btn-secondary m-5">Back</a>
</div>


@endsection
