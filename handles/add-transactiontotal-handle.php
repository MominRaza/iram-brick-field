<?php
    include('../db.php'); 
    $previus = $_POST['previus'];
    $income = $_POST['income'];
    $pakad = $_POST['pakad'];
    $paid = $_POST['paid'];

    $amount = $previus + $income - $paid;

    $q = "INSERT INTO transactiontotal (amount) VALUES ($amount)";
    $result = mysqli_query($conn, $q);

    if($result): header("Location:../daily-transaction.php");
    else: echo "Something Wrong";
    endif;
?>