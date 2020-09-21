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
    <?php
        $title = 'Sale Account';
        $back = './';
        include('./header.php');
    ?>
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
            <p class="title">
                <a href='./contact.php?contact=<?=$row['gadiwanid']?>'>
                    <?php 
                        echo(
                            mysqli_fetch_array(
                                mysqli_query(
                                    $conn,
                                    'SELECT name FROM user WHERE userid = '.$row['gadiwanid']
                                )
                            )['name']
                        );    
                    ?>
                </a>
            </p>
        </li>
        <?php endwhile;?>
    </ul>

    <?php
        $fab_title = 'Add Sale';
        $fab_icon = 'add';
        $fab_link = './add/add-sale.php';
        include('./fab.php');
    ?>
</body>
</html>