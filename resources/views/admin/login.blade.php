<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Comptible" content="IE-edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <title>Educational Platform</title>
</head>

<body>
    <div class="controller mx-auto py-5">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-11 rounded p-5 shadow mx-auto my-5">
                <h3 class="text-center pb-5 text-primary">Educational Platform</h3>
                <form action="{{route('admin.login')}}" method="post">
                    @csrf
                    @if(isset($error))
                    <p class="text-danger">{{$error}}</p>
                    @endif
                    @if ($errors->any())
                        @foreach ($errors->get('email') as $error)
                            <p class="text-danger">* {{ $error }}</p>
                        @endforeach
                    @endif
                        <div class="mb-3 ">
                            <label for="exampleInputEmail1" class="form-label font-weight-bold">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
                        </div>
                        @if ($errors->any())
                        @foreach ($errors->get('password') as $error)
                            <p class="text-danger">* {{ $error }}</p>
                        @endforeach
                    @endif
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label font-weight-bold">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" />
                        </div>
                        <button type="submit" class="btn btn-primary px-4" vlaue="Login">
                            Login
                        </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
