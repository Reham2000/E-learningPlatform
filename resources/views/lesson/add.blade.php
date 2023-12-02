@extends('admin.layout')

@section('title')
    Add Lesson
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 ">

                <form action="{{ route('lesson.create',$id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (isset($error))
                        <p class="text-danger">{{$error}}</p> 
                    @endif
                    <div class="mb-3 ">
                        <label for="exampleInputName1" class="form-label font-weight-bold">Lesson Name</label>
                        <input type="text" name="lesson_name" value="{{old('lesson_name')}}" class="form-control" id="exampleInputName1"
                            aria-describedby="emailHelp" />
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('lesson_name') as $error)
                            <p class="text-danger">* {{ $error }}</p>
                        @endforeach
                    @endif
                    <div class="mb-3 ">
                        <label for="exampleInputEmail1" class="form-label font-weight-bold">Lesson Description</label>
                        <textarea  name="lesson_desc"value="{{old('lesson_desc')}}" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" >{{old('lesson_desc')}}</textarea>
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('lesson_desc') as $error)
                            <p class="text-danger">* {{ $error }} </p>
                        @endforeach
                    @endif
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label font-weight-bold">Files</label>
                        <input type="file" name="file" class="form-control" id="exampleInputPassword1" />
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('file') as $error)
                            <p class="text-danger">* {{ $error }} </p>
                        @endforeach
                    @endif
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label font-weight-bold">Video</label>
                        <input type="file" name="video" class="form-control" id="exampleInputPassword1" />
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('video') as $error)
                            <p class="text-danger">* {{ $error }} </p>
                        @endforeach
                    @endif
                    
                    <button type="submit" class="btn btn-primary px-4" >
                        Add <i class="fas fa-plus px-2"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
