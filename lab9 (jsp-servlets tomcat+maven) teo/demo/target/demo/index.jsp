<!DOCTYPE html>
<html>
<head>
    <title>TicTacToe</title>
</head>
<body>
    <h1>TicTacToe</h1>

    <h2>Login</h2>
    <form action="login" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Login">
    </form>

    <h2>Register</h2>
    <form action="register" method="post">
        <label for="new_username">Username:</label><br>
        <input type="text" id="new_username" name="new_username"><br>
        <label for="new_password">Password:</label><br>
        <input type="password" id="new_password" name="new_password"><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>

<script>
    // Check if the 'registered' parameter is in the URL
    var urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('registered') === 'true') {
        // Show a popup message
        alert('Registration successful! You can now log in.');
    }
</script>