<?php
    include('../db.php'); 
    $userid = $_POST['name'];
    $row = $_POST['row'];
    $column = $_POST['column'];
    $plus = $_POST['plus'];
    $plusvalue = $_POST['plusvalue'];

    if($plus == '+'):
        $quantity = $row * $column + $plusvalue;
    else:
        $quantity = $row * $column - $plusvalue;
    endif;

    if(isset($_POST['pacchisa']) && $_POST['pacchisa'] == 'on'):
        $quantity = $quantity - $quantity*0.025;
    endif;
    $detail = $row.' x '.$column.' '.$plus.' '.$plusvalue;


    $q = "INSERT INTO kacchidaily (userid, detail, quantity) VALUES ($userid, '$detail', $quantity)";
    $result = mysqli_query($conn, $q);

    if($result): header("Location:../kacchi-daily.php");
    else: echo "Something Wrong";
    endif;
?>