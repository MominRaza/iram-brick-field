<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="./css/variables.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/form.css">
</head>
<body>
    <?php
        $title = 'Signup';
        include('./header.php');
    ?>
    
    <form action="./handles/signup-handle.php" method="post">
        <p class="label">Username</p>
        <input type="text" name="username" id="" placeholder='Enter Username'>
        <p class="label">Password</p>
        <input type="password" name="password" id="" placeholder='Create Password'>
        <input type="submit" value="Signup">
    </form>
    <p>Already have an account <a href="./login.php">Login</a></p>
</body>
</html>