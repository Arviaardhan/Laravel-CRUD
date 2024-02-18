@extends('layouts.main')

@section('container')

<!doctype html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
            <meta name="generator" content="Hugo 0.88.1">
            <title>Signin Template · Bootstrap v5.1</title>
            <link rel="stylesheet" href="/css/style.css">
            <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
        <link href="signin.css" rel="stylesheet">
        </head>
        <body class="text-center">
        
        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal">Please register</h1>
            <form method="POST" action="{{ route('register.store') }}"> 
                @csrf
                <div>
                    <input type="username" class="form-control" id="name" name="name" placeholder="name">
                    <label for="name">Username</label>
                </div>
                <br>
                <div>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                </div>
                <br>
                <div>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <br>
                <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                <br>
                <div style="display: flex; align-items: center;">
                    <h5 style="">Sudah punya akun?</h5>
                    <a href="{{ url('/login/index') }}"><h5>Login disini!</h5></a>
                </div>
            </form>
        </main>
  </body>
</html>

@endsection
