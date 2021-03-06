<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
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
    <h3 align="center">Register</h3><br />


    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ url('user/create_account_user') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Enter Name</label>
            <input type="text" name="name" class="form-control" placeholder="abc"/>
        </div>
        <div class="form-group">
            <label>Enter Email</label>
            <input type="email" name="email" class="form-control" placeholder="abc@example.com" />
        </div>
        <div class="form-group">
            <label>Enter Password</label>
            <input type="password" name="password" class="form-control" />
        </div>
        <div class="form-group">
            <label>Enter Password Confirmation</label>
            <input type="password" name="password_confirmation" class="form-control" />
        </div>
        <div class="form-group">
            <input type="submit" name="register" class="btn btn-primary" value="Register" />
        </div>
    </form>
</div>
</body>
</html>
