<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('register.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="name" />
        <input type="text" name="username" placeholder="username" />
        <input type="text" name="no_telp" placeholder="no_telp" />
        <input type="email" name="email" placeholder="email" />
        <input type="text" name="team" placeholder="team" />
        <input type="text" name="address" placeholder="address" />
        <input type="password" name="password" placeholder="password" required />
        <input type="password" name="password_confirmation" placeholder="password_confirmation" required />
        <button type="submit">Register</button>
    </form>
</body>

</html>
