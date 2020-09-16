<?php
    include('./db.php');
    $q = "select *from bharai";
    $results = mysqli_query($conn, $q);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bharai</title>
    <link rel="stylesheet" href="./css/variables.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./icons/material.css">
</head>

<body>
    <header>
        <a class='back' href="./index.php"><i class="material-icons">arrow_back</i></a>
        <h1>Bharai</h1>
    </header>
    
    <ul>
    <?php
    $total = 0;
    $rose = 0;
    $kali = 0;
    while($row = mysqli_fetch_assoc($results)): 
        $total = $total + $row['quantity'];
        $rose = $rose + $row['rose'];
        $kali = $kali + $row['kali'];
        
        ?>
        <li class='card'>
            <div class="right">
            <p class="quantity"><?php echo($row['quantity']);?></p>
            </div>
            <p class="name title"><?php echo($row['date']);?></p>
            <p>Rose: <?php echo($row['rose']);?>, Kali: <?php echo($row['kali']);?></p>
        </li>
        <?php endwhile;?>
    </ul>
    <p class="bottom">
        Chakkar Bharai: <?php echo($total); ?>,
        Rose: <?php echo($rose); ?>,
        Kali: <?php echo($kali); ?>
    </p>
    <div class="bottom_size_fix"></div>
</body>

</html>