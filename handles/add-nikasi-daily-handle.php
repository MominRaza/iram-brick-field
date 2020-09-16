<?php
    include('../db.php'); 
    $userid = $_POST['name'];
    $kali = $_POST['kali'];
    $rose = $_POST['rose'];

    $q = "INSERT INTO nikasidaily (userid, kali, rose) VALUES ($userid, $kali, $rose)";
    $result = mysqli_query($conn, $q);

    if($result): header("Location:../nikasi-daily.php");
    else: echo "Something Wrong";
    endif;
?>