<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password Mail</title>
</head>
<body>
    <h1>Reset Password email</h1>
    <p>Reset password link: <a href="{{url('/password/reset/'.$token)}}">Reset password</a></p> 
</body>
</html>