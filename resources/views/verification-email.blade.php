<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Comptible" content="IE-edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Verify Your Email</title>
    <style>
        a{
            text-decoration: none;
            background-color:darkslategrey;
            padding: 10px 30px;
            margin: 30px;
            color:white;
            font-size: 1.3rem;
            border-radius: 20px;
        }
        a:hover{
            color:black;
            text-decoration: none;
        }

    </style>
</head>
<body style="margin: 100px;algin-text-center">
    <div class="containar">
        <div class="col-sm-10 shadow py-5">
            <h3>Verify Your Email</h3>
            <hr>
            <p>You must verify your account to be able to enroll our courses.</p>
            <a class="btn btn-primary" href="{{env('APP_URL')}}/api/verify-account/{{$code}}" rel="noopener noreferrer">Verify</a>
        </div>
    </div>


</body>
</html>
