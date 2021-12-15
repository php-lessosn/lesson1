<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="login.php">
        <input type="text" name="email"/>
        <input type="password" name="password"/>
        <button type="submit" value="Save" style="color: blue">Save</button>
    </form>
</body>
</html>