@extends('admin.layout')

@section('title')
    Add Chapter
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 ">

                <form action="{{ route('chapter.create',$id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (isset($error))
                        <p class="text-danger">{{$error}}</p> 
                    @endif
                    <div class="mb-3 ">
                        <label for="exampleInputName1" class="form-label font-weight-bold">Chapter Name</label>
                        <input type="text" name="chapter_title" value="{{old('chapter_title')}}" class="form-control" id="exampleInputName1"
                            aria-describedby="emailHelp" />
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('chapter_title') as $error)
                            <p class="text-danger">* {{ $error }}</p>
                        @endforeach
                    @endif
                    <div class="mb-3 ">
                        <label for="exampleInputName1" class="form-label font-weight-bold">Chapter Required Time</label>
                        <input type="number" name="required_time" value="{{old('required_time')}}" class="form-control" id="exampleInputName1"
                            aria-describedby="emailHelp" />
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('required_time') as $error)
                            <p class="text-danger">* {{ $error }}</p>
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
