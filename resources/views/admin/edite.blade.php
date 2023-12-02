@extends('admin.layout')

@section('title')
    Edite Admin
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 ">
                <form action="{{ route('admin.update',$admin->id) }}" method="post">
                    @csrf
                    <div class="mb-3 ">
                        <label for="exampleInputName1" class="form-label font-weight-bold">Full Name</label>
                        <input type="text" name="fullname" value="{{ $admin->fullname}}" class="form-control" id="exampleInputName1"
                            aria-describedby="emailHelp" />
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('fullname') as $error)
                            <p class="text-danger">* {{ $error }}</p>
                        @endforeach
                    @endif
                    <div class="mb-3 ">
                        <label for="exampleInputEmail1" class="form-label font-weight-bold">Email address</label>
                        <input type="email" name="email" disabled value="{{ $admin->email}}" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" />
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('email') as $error)
                            <p class="text-danger">* {{ $error }} </p>
                        @endforeach
                    @endif
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label font-weight-bold">Password</label>
                        <input type="password" name="password"value="" class="form-control" id="exampleInputPassword1" />
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('password') as $error)
                            <p class="text-danger">* {{ $error }} </p>
                        @endforeach
                    @endif
                    <div class="mb-3">
                        <label for="exampleInputPassword2" class="form-label font-weight-bold">Password Confirmation</label>
                        <input type="password" name="password_confirmation"value="" class="form-control"
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
                            <option value="1" {{$admin->role == 1 ? 'selected' : ''}}>Admin</option>
                            <option value="2" {{$admin->role == 2 ? 'selected' : ''}}>Instructor</option>

                        </select>
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('role') as $error)
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
