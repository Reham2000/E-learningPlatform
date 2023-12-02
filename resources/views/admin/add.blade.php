@extends('admin.layout')

@section('title')
    Add Admin Or Instructor
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 ">
                <form action="{{ route('admin.create') }}" method="post">
                    @csrf
                    <div class="mb-3 ">
                        <label for="exampleInputName1" class="form-label font-weight-bold">Full Name</label>
                        <input type="text" name="fullname" value="{{old('fullname')}}" class="form-control" id="exampleInputName1"
                            aria-describedby="emailHelp" />
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('fullname') as $error)
                            <p class="text-danger">* {{ $error }}</p>
                        @endforeach
                    @endif
                    <div class="mb-3 ">
                        <label for="exampleInputEmail1" class="form-label font-weight-bold">Email address</label>
                        <input type="email" name="email"value="{{old('email')}}" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" />
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('email') as $error)
                            <p class="text-danger">* {{ $error }} </p>
                        @endforeach
                    @endif
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label font-weight-bold">Password</label>
                        <input type="password" name="password"value="{{old('password')}}" class="form-control" id="exampleInputPassword1" />
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('password') as $error)
                            <p class="text-danger">* {{ $error }} </p>
                        @endforeach
                    @endif
                    <div class="mb-3">
                        <label for="exampleInputPassword2" class="form-label font-weight-bold">Password Confirmation</label>
                        <input type="password" name="password_confirmation"value="{{old('password_confirmation')}}" class="form-control"
                            id="exampleInputPassword2" />
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('password_confirmation') as $error)
                            <p class="text-danger">* {{ $error }} </p>
                        @endforeach
                    @endif
                    <div class="mb-3">
                        <label for="roleSelectId" class="form-label font-weight-bold">Role</label>
                        <select class="form-control" name="role" id="roleSelectId">
                            <option value="" disabled="disabled" selected>Role...</option>
                            <option value="1" {{old('role') == 1 ? 'selected' : ''}}>Admin</option>
                            <option value="2" {{old('role') == 2 ? 'selected' : ''}}>Instructor</option>

                        </select>
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('role') as $error)
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
