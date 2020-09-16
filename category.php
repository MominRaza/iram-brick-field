<?php
    include('./db.php');
    $q = "select *from works";
    $results = mysqli_query($conn, $q);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="./css/variables-dark.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./icons/material.css">
</head>
<body>
    <header>
        <a href="./index.php" class="back"><i class="material-icons">arrow_back</i></a>
        <h1>Categories</h1>
    </header>
    <ul>
    <?php while($row = mysqli_fetch_assoc($results)): ?>
        <li class='card'>
            <div class="right t-right">
                <a class='edit' href="./add/add-category.php?category=<?php echo($row['workid']);?>"><i class="material-icons">edit</i></a>
            </div>
            <p class='title'><?php echo($row['work']);?></p>
            <p><?php echo($row['rate']);?></p>
        </li>
    <?php endwhile;?>
    </ul>
    <a href="./add/add-category.php" class="fab"><i class="material-icons">add</i>Add Category</a>
    <div class="fab_size_fix"></div>
</body>
</html>