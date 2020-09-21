<?php
    include('./db.php');

    $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
    $prev_date = date('Y-m-d', strtotime($date.' -1 day'));
    $next_date = date('Y-m-d', strtotime($date.' +1 day'));
    $date_view = date('d/m/Y', strtotime($date));
    
    $q = "select *from kacchidaily, user WHERE kacchidaily.userid = user.userid and date = '$date'";
    $results = mysqli_query($conn, $q);

    $qk = "select *from kacchi WHERE date = '".date('Y-m-d')."'";
    $resultk = mysqli_query($conn, $qk);
    $kacchi = mysqli_fetch_array($resultk);
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
    <?php
        $title = 'Kacchi Daily';
        $back = './';
        include('./header.php');
    ?>
    
    <div class="date">
        <a href="?date=<?=$prev_date;?>" class="previus" <?php if($prev_date < '2020-09-05'){echo('disabled');}?>><i class="material-icons">navigate_before</i>Previus Day</a>
        <a href="?date=<?=$next_date;?>" class="next" <?php if($next_date > date('Y-m-d')){echo('disabled');}?>>Next Day<i class="material-icons">navigate_next</i></a>
        <p><?=$date_view;?></p>
    </div>

    <ul>
    <?php
    $total = 0;
     while($row = mysqli_fetch_assoc($results)):
        if($row['extras'] == 0){$quantity1 =  $row['row'] * $row['kcolumn'] + $row['extra'];$sign = '+';}
        else{$quantity1 =  $row['row'] * $row['kcolumn'] - $row['extra'];$sign = '-';}
        if($row['pacchisa'] == 1){$quantity = $quantity1 - $quantity1*0.025;}else{$quantity = $quantity1;}
        $total = $total + $quantity;?>
        <li class='card'>
            <div class="right">
                <p class='title t-right'><?php echo($quantity);?></p>
                <?php if($date == date('Y-m-d') && $kacchi == null):?>
                    <a class='edit' href="./add/add-buggi-daily.php?buggiid=<?=$row['buggiid'];?>"><i class="material-icons">edit</i></a>
                    <a class='delete' href="./delete/delete-buggi-daily.php?buggiid=<?=$row['buggiid'];?>"><i class="material-icons">delete</i></a>
                <?php endif;?>
            </div>
            <p class="title"><?php echo($row['name']);?></p>
            <p class="detail"><?php echo($row['row']);?> x <?php echo($row['kcolumn']);?> <?php echo($sign);?> <?php echo($row['extra']);?> = <?php echo($quantity1);?></p>
        </li>
        <?php endwhile;?>
    </ul>
    <p class="bottom">Total Kacchi Daily: <?php echo($total); ?></p>
    <div class="bottom_size_fix"></div>
    <?php if($date == date('Y-m-d') && $kacchi == null):?>
        <a class='fab bottom_fix' href="./add/add-kacchi-daily.php"><i class="material-icons">add</i>Add Kacchi Daily</a>
        <div class="fab_size_fix"></div>
        <?php if($total > 0):?>
        <a href="./add/add-kacchi.php?quantity=<?php echo($total);?>" class="option"><i class="material-icons">done_all</i></a>
    <?php endif;endif;?>
</body>

</html>