<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/variables.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/form.css">
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>
    <form action="./handles/login-handle.php" method="post">
        <p class="label">Username</p>
        <input type="text" name="username" id="" placeholder='Enter Username'>
        <p class="label">Password</p>
        <input type="password" name="password" id="" placeholder='Enter Password'>
        <input type="submit" value="Login">
    </form>
    <p>Don't have an account <a href="./signup.php">Create New</a></p>
</body>
</html>