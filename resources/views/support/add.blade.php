@extends('admin.layout')

@section('title')
    Answer Support Messages
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 ">

                <form action="{{ route('support.answer',$id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (isset($error))
                        <p class="text-danger">{{$error}}</p> 
                    @endif
                    <div class="mb-3 ">
                        <label for="exampleInputName1" class="form-label font-weight-bold">Course Name</label>
                        <input type="text" name="meassage" disabled value="{{$support->meassage}}" class="form-control" id="exampleInputName1"
                            aria-describedby="emailHelp" />
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('meassage') as $error)
                            <p class="text-danger">* {{ $error }}</p>
                        @endforeach
                    @endif
                    <div class="mb-3 ">
                        <label for="exampleInputName1" class="form-label font-weight-bold">description</label>
                        <textarea type="number" name="answer" value="{{old('answer')}}" class="form-control" id="exampleInputName1"
                            aria-describedby="emailHelp">{{old('answer')}}</textarea>
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('answer') as $error)
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
