@extends('admin.layout')

@section('title')
    Edite Instructor
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 ">
                <form action="{{ route('instructor.update',$admin->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="exampleInputName1" class="form-label font-weight-bold">Full Name</label>
                            <input type="text" name="fullname" disabled value="{{ $admin->fullname}}" class="form-control" id="exampleInputName1"
                                aria-describedby="emailHelp" />
                        </div>
                        @if ($errors->any())
                            @foreach ($errors->get('fullname') as $error)
                                <p class="text-danger">* {{ $error }}</p>
                            @endforeach
                        @endif
                        <div class="mb-3 col-md-6">
                            <label for="exampleInputEmail1" class="form-label font-weight-bold">Email address</label>
                            <input type="email" name="email" disabled value="{{ $admin->email}}" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" />
                        </div>
                        @if ($errors->any())
                            @foreach ($errors->get('email') as $error)
                                <p class="text-danger">* {{ $error }} </p>
                            @endforeach
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="textarea_breif" class="form-label font-weight-bold">Personal information</label>
                        <textarea name="brief" class="form-control" id="textarea_breif" >{{$instructor->brief ?? ''}}</textarea>
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('brief') as $error)
                            <p class="text-danger">* {{ $error }} </p>
                        @endforeach
                    @endif
                    <div class="mb-3">
                        <label for="qualificationID" class="form-label font-weight-bold">Qualification</label>
                        <textarea name="qualification"value="" class="form-control"
                            id="qualificationID" >{{$instructor->qualification ?? ''}}</textarea>
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('qualification') as $error)
                            <p class="text-danger">* {{ $error }} </p>
                        @endforeach
                    @endif
                    <div class="mb-3">
                        <label for="imageID" class="form-label font-weight-bold">Photo</label>
                        <input type="file" name="image" value="" class="form-control" id="imageID"
                            aria-describedby="emailHelp" />
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('image') as $error)
                            <p class="text-danger">* {{ $error }} </p>
                        @endforeach
                    @endif
                    <button type="submit" class="btn btn-primary px-4" vlaue="Login">
                        Update <i class="fas fa-list px-2"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
