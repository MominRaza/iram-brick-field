<?php
    include('./db.php');

    $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
    $prev_date = date('Y-m-d', strtotime($date.' -1 day'));
    $next_date = date('Y-m-d', strtotime($date.' +1 day'));
    $date_view = date('d/m/Y', strtotime($date));
    
    $q = "select *from kacchidaily, user WHERE kacchidaily.userid = user.userid and date = '$date'";
    $results = mysqli_query($conn, $q);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kacchi Daily</title>
    <link rel="stylesheet" href="./css/variables.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./icons/material.css">
</head>

<body>
    <header>
        <a class='back' href="./index.php"><i class="material-icons">arrow_back</i></a>
        <a href="#" class="option"><i class="material-icons">save</i>Save</a>
        <h1>Kacchi Daily</h1>
    </header>

    <div class="date">
        <a href="?date=<?=$prev_date;?>" class="previus" <?php if($prev_date < '2020-09-05'){echo('disabled');}?>><i class="material-icons">navigate_before</i>Previus Day</a>
        <a href="?date=<?=$next_date;?>" class="next" <?php if($next_date > date('Y-m-d')){echo('disabled');}?>>Next Day<i class="material-icons">navigate_next</i></a>
        <p><?=$date_view;?></p>
    </div>

    <ul>
    <?php
    $total = 0;
     while($row = mysqli_fetch_assoc($results)): 
        $total = $total + $row['quantity'];?>
        <li class='card'>
            <div class="right">
                <p class="quantity"><?php echo($row['quantity']);?></p>
            </div>
            <p class="name title"><?php echo($row['name']);?></p>
            <p class="detail"><?php echo($row['detail']);?></p>
        </li>
        <?php endwhile;?>
    </ul>
    <p class="bottom">Total Kacchi Daily: <?php echo($total); ?></p>
    <a class='fab bottom_fix' href="./add/add-kacchi-daily.php"><i class="material-icons">add</i>Add Kacchi Daily</a>
</body>

</html>