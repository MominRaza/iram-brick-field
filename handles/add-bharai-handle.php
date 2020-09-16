<?php
    include('../db.php'); 
    $quantity = $_POST['quantity'];
    $rose = $_POST['rose'];
    $kali = $_POST['kali'];

    $q = "INSERT INTO bharai (quantity, rose, kali) VALUES ($quantity, $rose, $kali)";
    $result = mysqli_query($conn, $q);

    if($result): header("Location:../bharai.php");
    else: echo "Something Wrong";
    endif;
?>