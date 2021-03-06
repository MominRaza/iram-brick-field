<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iram Brick Field</title>
    <link rel="stylesheet" href="./css/variables.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/form.css">
    <link rel="stylesheet" href="./icons/material.css">
</head>

<body>
    <?php
        $title = 'Iram Brick Field';
        include('./header.php');
    ?>

    <form class='search' action="./contacts.php">
        <input type="search" name="search" id="search" placeholder="Search Contacts" required>
        <button type="submit"><i class="material-icons">search</i></button>
    </form>
    <div class="grid grid2">
        <a href='./daily-transaction.php' class="grid_element">
            <img src="./images/logo.png" alt="Daily Transaction">
            <p class='title'>Daily Transaction</p>
        </a>
        <a href='./contacts.php' class="grid_element">
            <img src="./images/logo.png" alt="Contacts">
            <p class='title'>Contacts</p>
        </a>
        <a href='./sale-account.php' class="grid_element">
            <img src="./images/logo.png" alt="Sale Account">
            <p class='title'>Sale Account</p>
        </a>
        <a href='./kacchi-daily.php' class="grid_element">
            <img src="./images/logo.png" alt="Kacchi Daily">
            <p class='title'>Kacchi Daily</p>
        </a>
        <a href='./buggi-daily.php' class="grid_element">
            <img src="./images/logo.png" alt="Buggi Daily">
            <p class='title'>Buggi Daily</p>
        </a>
        <a href='./bharai.php' class="grid_element">
            <img src="./images/logo.png" alt="Bharai">
            <p class='title'>Bharai</p>
        </a>
        <a href='./nikasi-daily.php' class="grid_element">
            <img src="./images/logo.png" alt="Nikasi Daily">
            <p class='title'>Nikasi Daily</p>
        </a>
        <a href='./category.php' class="grid_element">
            <img src="./images/logo.png" alt="Category">
            <p class='title'>Category</p>
        </a>
    </div>
    
    <?php
        $fab_title = 'Add Transaction';
        $fab_icon = 'add';
        $fab_link = './add/add-daily-transaction.php';
        include('./fab.php');
    ?>
</body>

</html>