<!DOCTYPE html>
<html>
<head>
    <title>Employee Register</title>
</head>
<body>
    <h1>Employee Registration</h1>
    <form action="{{ route('employee.register') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" required>
        <button type="submit">Register</button>
    </form>
</body>
</html>
