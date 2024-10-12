<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if (session()->has('errorLogin'))
        <h1>Salah akun hehe</h1>
    @endif
    <form action="{{ route('login.authentication') }}" method="POST">
        @csrf
        <input type="text" name="username" placeholder="username" />
        <input type="password" name="password" placeholder="password" required />
        <button type="submit">Login</button>
    </form>
</body>

</html>
