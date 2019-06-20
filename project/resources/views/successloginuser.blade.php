<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
            border:1px solid #ccc;
        }
    </style>
</head>
<body>
<br />
<div class="container box">

    @if(isset(Auth::user()->email))
        <div class="alert alert-danger success-block">
            <strong>Welcome USER {{ Auth::user()->name }}</strong>
            <br />
            <strong>You are logged in as an user </strong>
            <br />
            <a href="{{ url('/user/logout') }}">Logout</a>
        </div>
    @else
        <script>window.location = "/";</script>
    @endif

    <br />
</div>
</body>
</html>
