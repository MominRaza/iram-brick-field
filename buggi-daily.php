<?php
    include('./db.php');
    
    $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
    $prev_date = date('Y-m-d', strtotime($date.' -1 day'));
    $next_date = date('Y-m-d', strtotime($date.' +1 day'));
    $date_view = date('d/m/Y', strtotime($date));

    $q = "select *from buggidaily, user WHERE buggidaily.userid = user.userid and date = '$date'";
    $results = mysqli_query($conn, $q);

    $qb = "select *from bharai WHERE date = '".date('Y-m-d')."'";
    $resultb = mysqli_query($conn, $qb);
    $bharai = mysqli_fetch_array($resultb);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buggi Daily</title>
    <link rel="stylesheet" href="./css/variables.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./icons/material.css">
</head>

<body>
    <header>
        <a class='back' href="./index.php"><i class="material-icons">arrow_back</i></a>
        <h1>Buggi Daily</h1>
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
        $total = $total + $row['token'] * $row['khep'];?>
        <li class='card'>
            <div class="right">
                <p class="t-right title"><?php echo($row['token'] * $row['khep']);?></p>
                <?php if($date == date('Y-m-d') && $bharai == null):?>
                    <a class='edit' href="./add/add-buggi-daily.php?buggiid=<?=$row['buggiid'];?>"><i class="material-icons">edit</i></a>
                    <a class='delete' href="./delete/delete-buggi-daily.php?buggiid=<?=$row['buggiid'];?>"><i class="material-icons">delete</i></a>
                <?php endif;?>
            </div>
            <p class="name title"><a href="./contact.php?contact=<?php echo($row['userid']);?>"><?php echo($row['name']);?></a></p>
            <p class="token"><?php echo($row['token']);?> x <?php echo($row['khep']);?></p>
        </li>
    <?php endwhile;?>
    </ul>
    
    <?php
        
    if($date == date('Y-m-d') && $bharai == null):?>
        <a class='fab bottom_fix' href="./add/add-buggi-daily.php"><i class="material-icons">add</i>Add Buggi Daily</a>
        <div class="fab_size_fix"></div>
        <?php if($total > 0):?>
            <a href="./add/add-bharai.php?quantity=<?php echo($total);?>" class="option"><i class="material-icons">save</i>Save</a>
    <?php endif;endif;?>

    <p class="bottom">Total Today Bharai: <?php echo($total);?></p>
    <div class="bottom_size_fix"></div>
</body>

</html>