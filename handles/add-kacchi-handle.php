<?php
    include('../db.php'); 
    $quantity = $_POST['quantity'];

    $q = "INSERT INTO kacchi (quantity) VALUES ($quantity)";
    $result = mysqli_query($conn, $q);

    if($result): header("Location:../bharai.php");
    else: echo "Something Wrong";
    endif;
?>