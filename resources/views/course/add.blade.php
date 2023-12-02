@extends('admin.layout')

@section('title')
    Add Course
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 ">

                <form action="{{ route('course.create',$id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (isset($error))
                        <p class="text-danger">{{$error}}</p> 
                    @endif
                    <div class="mb-3 ">
                        <label for="exampleInputName1" class="form-label font-weight-bold">Course Name</label>
                        <input type="text" name="course_title" value="{{old('course_title')}}" class="form-control" id="exampleInputName1"
                            aria-describedby="emailHelp" />
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('course_title') as $error)
                            <p class="text-danger">* {{ $error }}</p>
                        @endforeach
                    @endif
                    <div class="mb-3 ">
                        <label for="exampleInputName1" class="form-label font-weight-bold">description</label>
                        <textarea type="number" name="course_brief" value="{{old('course_brief')}}" class="form-control" id="exampleInputName1"
                            aria-describedby="emailHelp">{{old('course_brief')}}</textarea>
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('course_brief') as $error)
                            <p class="text-danger">* {{ $error }}</p>
                        @endforeach
                    @endif
                    <div class="mb-3 ">
                        <label for="exampleInputName1" class="form-label font-weight-bold">Course Price</label>
                        <input type="number" name="course_price" value="{{old('course_price')}}" class="form-control" id="exampleInputName1"
                            aria-describedby="emailHelp" />
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('course_price') as $error)
                            <p class="text-danger">* {{ $error }}</p>
                        @endforeach
                    @endif
                    <div class="mb-3 ">
                        <label for="exampleInputName1" class="form-label font-weight-bold">Course Category</label>
                        <select name="category_id" id="" class="form-control">
                            <option value="" disabled selected>Category...</option>
                            @foreach ($categories as $category )
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('category_id') as $error)
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
