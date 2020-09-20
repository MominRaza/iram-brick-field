<?php
    include('./db.php');
    $contact = $_GET['contact'];
    $q = "select *from user, works WHERE user.workid = works.workid AND userid = $contact";
    $results = mysqli_query($conn, $q);
    $user = mysqli_fetch_array($results);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="./css/variables.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./icons/material.css">
</head>

<body>
    <header>
        <a class='back' href="./contacts.php"><i class="material-icons">arrow_back</i></a>
        <h1><?php echo($user['name']);?></h1>
    </header>
    <div class='card'>
        <div class="left">
            <p><?php echo($user['work']);?></p>
        </div>
        <div class="right t-right">
            <a href="tel:<?php echo($user['number']);?>"><i class="material-icons">call</i></a>
        </div>
        <p class="title bold"><?php echo($user['address']);?></p>
        <p><?php echo($user['number']);?></p>
    </div>
    <div class="bottom_size_fix"></div>
    <div class="list_top">
        <a href="<?php if($user['workid'] == 3): echo('./add/add-buggi-daily.php?contact='.$user['userid']); endif;?>" class="right"><i class="material-icons md-18">add</i>Add</a>
        <h2 class='title'>Work</h2>
    </div>
    <ul>
        <?php if($user['workid'] == 3):
            $qa = "select *from buggidaily WHERE userid = $contact";
            $resultsa = mysqli_query($conn, $qa);
            $total = 0;
            while($row = mysqli_fetch_assoc($resultsa)): 
                $total = $total + $row['token'] * $row['khep'];?>
                <li class='card'>
                    <div class="right">
                        <p><?php echo($row['token'] * $row['khep']);?></p>
                    </div>
                    <p class="title bold"><?php echo($row['date']);?></p>
                    <p><?php echo($row['token']);?> x <?php echo($row['khep']);?></p>
                </li>
        <?php endwhile; elseif($user['workid'] == 8):
            $qa = "select *from kacchidaily WHERE userid = $contact";
            $resultsa = mysqli_query($conn, $qa);
            $total = 0;
            while($row = mysqli_fetch_assoc($resultsa)): 
                $total = $total + $row['quantity'];?>
                <li class='card'>
                    <div class="right">
                        <p><?php echo($row['quantity']);?></p>
                    </div>
                    <p class="title bold"><?php echo($row['date']);?></p>
                    <p><?php echo($row['detail']);?></p>
                </li>
        <?php endwhile; elseif($user['workid'] == 7):
            $qa = "select *from nikasidaily WHERE userid = $contact";
            $resultsa = mysqli_query($conn, $qa);
            $total = 0;
            while($row = mysqli_fetch_assoc($resultsa)): 
                $total = $total + $row['kali'] + $row['rose'];?>
                <li class='card'>
                    <div class="right">
                        <p><?php echo($row['kali'] + $row['rose']);?></p>
                    </div>
                    <p class="title bold"><?php echo($row['date']);?></p>
                    <p><?php echo($row['kali']);?> Kali, <?php echo($row['rose']);?> Rose</p>
                </li>
        <?php endwhile; endif;?>
    </ul>
    <p class="list-bottom">Total Work: <?php echo($total);?></p>
    <div class="list_top">
        <a href="./add/add-daily-transaction.php?contact=<?php echo($user['userid']);?>" class="right"><i class="material-icons md-18">add</i>Add</a>
        <h2 class='title'>Paid</h2>
    </div>
    <ul>
        <?php
            $r = "select *from transaction where userid = $contact and type = 2";
            $resultsd = mysqli_query($conn, $r);
            $totalpaid = 0;
            while($row2 = mysqli_fetch_assoc($resultsd)): 
                $totalpaid = $totalpaid + $row2['amount'];?>
                <li class='card'>
                    <div class="right">
                        <p class="amount t-right"><?php echo($row2['amount']);?></p>
                    </div>
                    <p class="title bold"><?php echo($row2['date']);?></p>
                    <p><?php echo($row2['detail']);?></p>
                </li>
        <?php endwhile;?>
    </ul>
    <p class="list-bottom">Total Paid: <?php echo($totalpaid);?></p>
    <a class='fab bottom_fix' href="./add/add-contact.php?contact=<?php echo($contact);?>"><i class="material-icons">edit</i>Edit Contact</a>
    <div class="fab_size_fix"></div>
    <p class="bottom">Total Available Amount: <?php echo($total - $totalpaid);?></p>
    <div class="bottom_size_fix"></div>
</body>

</html>