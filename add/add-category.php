<?php
    include('../db.php');
    if(isset($_GET['category'])){
        $categoryid = $_GET['category'];
        $q = "select *from works WHERE workid = $categoryid";
        $results = mysqli_query($conn, $q);
        $category = mysqli_fetch_array($results);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../icons/material.css">
</head>
<body>
    <header>
        <a href="../category.php" class="back"><i class="material-icons">arrow_back</i></a>
        <h1><?php
            if(isset($category)):
                echo('Edit Category');
            else:
                echo('Add Category');
            endif;
        ?></h1>
    </header>
    <form action="../handles/add-category-handle.php" method="post">
        <input type="hidden" name="workid" value='<?php if(isset($category)){echo($category['workid']);}?>'>
        <p class="label">Work</p>
        <input type="text" name="work" placeholder='Enter Work' value='<?php if(isset($category)){echo($category['work']);}?>' required>
        <p class="label">Rate</p>
        <input type="text" name="rate" placeholder='Enter Rate' value='<?php if(isset($category)){echo($category['rate']);}?>' required>
        <input type="submit" value="Save">
    </form>
</body>
</html>