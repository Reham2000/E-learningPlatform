@extends('admin.layout')

@section('title')
    Add Category
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 ">

                <form action="{{ route('category.create',$id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (isset($error))
                        <p class="text-danger">{{$error}}</p> 
                    @endif
                    <div class="mb-3 ">
                        <label for="exampleInputName1" class="form-label font-weight-bold">Category Name</label>
                        <input type="text" name="category_name" value="{{old('category_name')}}" class="form-control" id="exampleInputName1"
                            aria-describedby="emailHelp" />
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('category_name') as $error)
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
