<?php
    include('./db.php');

    $q = "select *from sale, user, works where sale.userid = user.userid and user.workid = works.workid";
    $results = mysqli_query($conn, $q);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale Account</title>
    <link rel="stylesheet" href="./css/variables.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./icons/material.css">
</head>
<body>
    <header>
        <a href="./" class="back"><i class="material-icons">arrow_back</i></a>
        <h1>Sale Account</h1>
    </header>
    <h2 class="list_top">Sale Account</h2>
    <ul>
        <?php while($row = mysqli_fetch_assoc($results)):?>
        <li class='card'>
            <div class="right">
                <p class="title t-right"><?=$row['location']?></p>
            </div>
            <p class="title"><a href='./contact.php?contact=1'><?=$row['name']?>, <?=$row['address']?></a></p>
            <p><?php 
                if($row['awwal'] != 0){echo('Awwal: '.$row['awwal'].', ');}
                if($row['doyam'] != 0){echo('Doyam: '.$row['doyam'].', ');}
                if($row['peela'] != 0){echo('Peela: '.$row['peela'].', ');}
                if($row['kharapeela'] != 0){echo('KhPeela: '.$row['kharapeela'].', ');}
                if($row['chatka'] != 0){echo('Chatka: '.$row['chatka'].', ');}
                if($row['addha'] != 0){echo('Addha: '.$row['addha']);}
            ?></p>
            <p>C.N.: <?=$row['chno']?></p>
            <p class="title"><a href='./contact.php?contact=1'>Gadiwan Name</a></p>
        </li>
        <?php endwhile;?>
    </ul>
    <a href="./add/add-sale.php" class="fab"><i class="material-icons">add</i>Add Sale</a>
    <div class="fab_size_fix"></div>
</body>
</html>