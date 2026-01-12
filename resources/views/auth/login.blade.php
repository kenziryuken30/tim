<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>LOGIN TEST</h2>

<form method="POST" action="/login">
    @csrf

    <div>
        <label>Username</label><br>
        <input type="text" name="username" value="operator">
    </div>

    <div>
        <label>Password</label><br>
        <input type="password" name="password" value="123456">
    </div>

    <button type="submit">LOGIN</button>
</form>

@if ($errors->any())
    <p style="color:red">{{ $errors->first() }}</p>
@endif

</body>
</html>
