<?php
    include('./db.php');

    $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
    $prev_date = date('Y-m-d', strtotime($date.' -1 day'));
    $next_date = date('Y-m-d', strtotime($date.' +1 day'));
    $date_view = date('d/m/Y', strtotime($date));

    $pr = "select *from transactiontotal where date = '$prev_date'";
    $resultspr = mysqli_query($conn, $pr);
    $resultpr = mysqli_fetch_array($resultspr);
    $previusamount = $resultpr['amount'];

    $q = "select *from transaction, user, works where date = '$date' and type = 1 and transaction.userid = user.userid and user.workid = works.workid";
    $resultsi = mysqli_query($conn, $q);
    $r = "select *from transaction, user, works where date = '$date' and type = 2 and transaction.userid = user.userid and user.workid = works.workid";
    $resultsd = mysqli_query($conn, $r);
    $p = "select *from transaction, user where date <= '$date' and type = 3 and transaction.userid = user.userid ORDER BY transaction.userid ASC";
    $resultsp = mysqli_query($conn, $p);

    $qt = "select *from transactiontotal WHERE date = '".date('Y-m-d')."'";
    $resultt = mysqli_query($conn, $qt);
    $ttt = mysqli_fetch_array($resultt);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily</title>
    <link rel="stylesheet" href="./css/variables.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./icons/material.css">
</head>

<body>
    <header>
        <a class='back' href="./index.php"><i class="material-icons">arrow_back</i></a>
        <h1>Daily Transaction</h1>
    </header>

    <div class="date">
        <a href="?date=<?=$prev_date;?>" class="previus" <?php if($prev_date < '2020-09-15'){echo('disabled');}?>><i class="material-icons">navigate_before</i>Previus Day</a>
        <a href="?date=<?=$next_date;?>" class="next" <?php if($next_date > date('Y-m-d')){echo('disabled');}?>>Next Day<i class="material-icons">navigate_next</i></a>
        <p><?=$date_view;?></p>
    </div>
    <p class="list-bottom">Previus Amount: <?php echo($previusamount);?></p>

    <div class="row">
        <div class="col-24 r-col-12">
            <h2 class='list_top'>Income</h2>
            <ul>
                <?php
                $totalincome = 0;
                while($row = mysqli_fetch_assoc($resultsi)): 
                    $totalincome = $totalincome + $row['amount'];?>
                    <li class='card'>
                        <div class="right">
                            <p class="t-right title"><?php echo($row['amount']);?></p>
                            <?php if($date == date('Y-m-d') && $ttt == null):?>
                                <a class='edit' href="./add/add-buggi-daily.php?buggiid=<?=$row['buggiid'];?>"><i class="material-icons">edit</i></a>
                                <a class='delete' href="./delete/delete-buggi-daily.php?buggiid=<?=$row['buggiid'];?>"><i class="material-icons">delete</i></a>
                            <?php endif;?>
                        </div>
                        <p class="name title"><?php echo($row['name']);?>, <?php echo($row['address']);?>, <?php echo($row['work']);?></p>
                        <p class="detail"><?php echo($row['detail']);?></p>
                    </li>
                <?php endwhile;?>
            </ul>
            <p class="list-bottom">Today Total Income: <?php echo($totalincome);?></p>

            <h2 class='list_top'>Pakad</h2>
            <ul>
                <?php
                $totalpakad = 0;
                $repeat = 0;
                $userid = 0;

                $pakad['amount'] = 0;
                $pakad['name'] = '';
                $i=0;
                $length = mysqli_num_rows($resultsp);
                
                while($row3 = mysqli_fetch_assoc($resultsp)): 
                    $totalpakad = $totalpakad + $row3['amount'];
                    if($i==0){
                        $userid = $row3['userid'];
                    }
                    $i++;
                    if($userid == $row3['userid']){
                        $pakad['name'] = $row3['name'];
                        $pakad['amount'] += $row3['amount'];
                    }else{
                        $userid = $row3['userid'];
                        if($pakad['name'] != ''){
                    ?>
                    <li class='card'>
                        <div class="right">
                            <p class="t-right title"><?php echo($pakad['amount']);?></p>
                        </div>
                        <p class="name title"><?php echo($pakad['name']);?> 2</p>
                    </li>
                    <?php }
                    
                    $pakad['name'] = $row3['name'];
                    $pakad['amount'] = $row3['amount'];
                    if($i == $length){ ?>
                        <li class='card'>
                        <div class="right">
                            <p class="t-right title"><?php echo($pakad['amount']);?></p>
                        </div>
                        <p class="name title"><?php echo($pakad['name']);?> 2</p>
                    </li>
                    <?php } }?>
                    <?php if($row3['date'] == $date){ ?>
                    <li class='card'>
                        <div class="right">
                            <p class="t-right title new"><?php echo($row3['amount']);?></p>
                            <?php if($row3['date'] == date('Y-m-d') && $ttt == null):?>                           
                                <a class='edit' href="./add/add-daily-transaction.php?transactionid=<?=$row3['transactionid'];?>"><i class="material-icons">edit</i></a>
                                <a class='delete' href="./delete/delete-daily-transaction.php?transactionid=<?=$row3['transactionid'];?>"><i class="material-icons">delete</i></a>
                            <?php endif;?>
                        </div>
                        <p class="name title"><?php echo($row3['name']);?></p>
                        <?php if($row3['date'] == $date):?>
                        <p class="detail"><?php echo($row3['detail']);?></p>
                        <?php endif;?>
                    </li>
                    <?php }?>
                <?php endwhile;?>
            </ul>
            <p class="list-bottom">Total Pakad: <?php echo($totalpakad);?></p>
        </div>
        <div class="col-24 r-col-12">
            <h2 class='list_top'>Paid</h2>
            <ul>
                <?php
                $totalpaid = 0;
                while($row2 = mysqli_fetch_assoc($resultsd)): 
                    $totalpaid = $totalpaid + $row2['amount'];?>
                    <li class='card'>
                        <div class="right">
                            <p class="t-right title"><?php echo($row2['amount']);?></p>
                            <?php if($date == date('Y-m-d') && $ttt == null):?>
                                <a class='edit' href="./add/add-buggi-daily.php?buggiid=<?=$row['buggiid'];?>"><i class="material-icons">edit</i></a>
                                <a class='delete' href="./delete/delete-buggi-daily.php?buggiid=<?=$row['buggiid'];?>"><i class="material-icons">delete</i></a>
                            <?php endif;?>
                        </div>
                        <p class="name title"><?php echo($row2['name']);?>, <?php echo($row2['address']);?>, <?php echo($row2['work']);?></p>
                        <p class="detail"><?php echo($row2['detail']);?></p>
                    </li>
                <?php endwhile;?>
            </ul>
            <p class="list-bottom">Today Total Paid: <?php echo($totalpaid);?></p>
        </div>
    </div>

    <?php if($date == date('Y-m-d') && $ttt == null):?>
        <a class='fab bottom_fix' href="./add/add-daily-transaction.php"><i class="material-icons">add</i>Add Transaction</a>
        <div class="fab_size_fix"></div>

        <a href="./add/add-transactiontotal.php?previus=<?=$previusamount;?>&income=<?=$totalincome;?>&pakad=<?=$totalpakad;?>&paid=<?=$totalpaid;?>" class="option"><i class="material-icons">done_all</i></a>
    <?php endif;?>
    <p class="bottom">Total Roked: <?php $total = $previusamount + $totalincome - $totalpakad - $totalpaid; echo($total); ?></p>
    <div class="bottom_size_fix"></div>
</body>

</html>