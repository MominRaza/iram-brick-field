<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="./css/variables.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/form.css">
    <link rel="stylesheet" href="./icons/material.css">
</head>
<body>
    <?php
        $title = 'Change Password';
        $back = './';
        include('./header.php');
    ?>
    
    <form action="./handles/change-password-handle.php" method="post">
        <p class="label">Old Password</p>
        <input type="password" name="password" id="" placeholder='Enter Old Password'>
        <p class="label">New Password</p>
        <input type="password" name="password" id="" placeholder='Enter New Password'>
        <input type="password" name="password" id="" placeholder='Re-Enter New Password'>
        <input type="submit" value="Change Password">
    </form>
</body>
</html>