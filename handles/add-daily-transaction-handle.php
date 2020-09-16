<?php
    include('../db.php'); 
    $userid = $_POST['name'];
    $type = $_POST['type'];
    $detail = $_POST['detail'];
    $amount = $_POST['amount'];

    $q = "INSERT INTO transaction (userid, type, detail, amount) VALUES ($userid, $type, '$detail', $amount)";
    $result = mysqli_query($conn, $q);

    if($result): header("Location:../daily-transaction.php");
    else: echo "Something Wrong";
    endif;
?>