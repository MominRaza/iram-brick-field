<?php
    include('../db.php'); 
    $userid = $_POST['name'];
    $row = $_POST['row'];
    $column = $_POST['column'];
    $plus = $_POST['plus'];
    $plusvalue = $_POST['plusvalue'];
    $pacchisa = isset($_POST['pacchisa']) ? 1 : 0;

    echo($userid.$row.$column.$plus.$plusvalue.$pacchisa);

    $q = "INSERT INTO kacchidaily (userid, row, kcolumn, extras, extra, pacchisa) VALUES ($userid, $row, $column, $plus, $plusvalue, $pacchisa)";
    $result = mysqli_query($conn, $q);

    if($result): header("Location:../kacchi-daily.php");
    else: echo "Something Wrong";
    endif;
?>