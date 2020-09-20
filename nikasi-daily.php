<?php
    include('./db.php');

    $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
    $prev_date = date('Y-m-d', strtotime($date.' -1 day'));
    $next_date = date('Y-m-d', strtotime($date.' +1 day'));
    $date_view = date('d/m/Y', strtotime($date));

    $q = "select *from nikasidaily, user WHERE nikasidaily.userid = user.userid and date = '$date'";
    $results = mysqli_query($conn, $q);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nikasi Daily</title>
    <link rel="stylesheet" href="./css/variables.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./icons/material.css">
</head>

<body>
    <header>
        <a href="./index.php" class="back"><i class="material-icons">arrow_back</i></a>
        <?php if($date == date('Y-m-d')):?>
            <a href="#" class="option"><i class="material-icons">done_all</i></a>
        <?php endif;?>
        <h1>Nikasi Daily</h1>
    </header>

    <div class="date">
        <a href="?date=<?=$prev_date;?>" class="previus" <?php if($prev_date < '2020-09-05'){echo('disabled');}?>><i class="material-icons">navigate_before</i>Previus Day</a>
        <a href="?date=<?=$next_date;?>" class="next" <?php if($next_date > date('Y-m-d')){echo('disabled');}?>>Next Day<i class="material-icons">navigate_next</i></a>
        <p><?=$date_view;?></p>
    </div>

    <ul>
    <?php 
        if($results==null): echo('Nothing!');
        else: while($row = mysqli_fetch_assoc($results)):?>
        <li class='card'>
            <?php if($date == date('Y-m-d')):?>
                <div class="right">
                    <a class='edit' href="./add/add-buggi-daily.php?buggiid=<?=$row['buggiid'];?>"><i class="material-icons">edit</i></a>
                    <a class='delete' href="./delete/delete-buggi-daily.php?buggiid=<?=$row['buggiid'];?>"><i class="material-icons">delete</i></a>
                </div>
            <?php endif;?>
            <p class="name title"><?php echo($row['name']);?></p>
            <p><?php echo($row['kali']);?> Kali, <?php echo($row['rose']);?> Rose</p>
        </li>
    <?php endwhile; endif;?>
    </ul>
    <?php if($date == date('Y-m-d')):?>
        <a class='fab' href="./add/add-nikasi-daily.php"><i class="material-icons">add</i>Add Nikasi Daily</a>
        <div class="fab_size_fix"></div>
    <?php endif;?>
</body>

</html>