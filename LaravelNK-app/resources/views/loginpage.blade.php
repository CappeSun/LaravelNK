<?php

use Illuminate\Http\Request;

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loginpage.css') }}">
</head>
<body>
    <form method="post" action="/login">
        <div>
            <label for="email">Email</label>
            <input name="email" id="email" type="email">
            <span><?= $errors->first('email'); ?></span>
        </div>
        <div>
            <label for="password">Password</label>
            <input name="password" id="password" type="password">
            <span><?= $errors->first('password'); ?></span>
        </div>
        <button type="submit">Login</button>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</body>
</html>