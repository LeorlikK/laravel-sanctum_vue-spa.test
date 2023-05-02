<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
<form action="{{ route('login') }}" method="post">
    @csrf
    <div class="w-25">
        <div class="mb-3">
            <label for="exampleFormControlEmail" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlEmail">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlUserName" class="form-label">UserName</label>
            <input type="text" name="username" class="form-control" id="exampleFormControlUserName">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlPassword" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleFormControlPassword">
        </div>
        <button class="btn btn-success" type="submit">Login</button>
    </div>
</form>
</body>
</html>
