<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        div {
            margin-top: 1em;
        }
    </style>
</head>
<body>
<form method="post" action="{{ route('register') }}">
    @csrf
    <div>
        <input type="text" name="name" id="name" placeholder="enter name">
        @error('name')
        <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <input type="text" name="email" id="email" placeholder="enter email">
        @error('email')
        <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <input type="password" name="password" id="password">
        @error('password')
        <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <input type="password" name="password_confirmation" id="password_confirmation">
        @error('password_confirmation')
        <div>{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Login</button>
</form>
</body>
</html>
