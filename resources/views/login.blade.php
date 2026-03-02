<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
</head>
<body>
    <form action="{{ route('login.process') }}" method="post">
        @csrf

        @if(session('sukses')) {
            <p style="color: green;">{{ session('sukses') }}</p>
        }
        @endif
        @if(session('error')) {
            <p style="color: red;">{{ session('error') }}</p>
        }
        @endif

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>