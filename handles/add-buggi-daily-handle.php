<?php
    include('../db.php');
    $buggiid = $_POST['buggiid'];
    $userid = $_POST['name'];
    $token = $_POST['token'];
    $khep = $_POST['khep'];

    if($buggiid!=null){
        $q = "UPDATE buggidaily SET userid = $userid, token = $token, khep = $khep WHERE buggiid = $buggiid";
    }
    else{
        $q = "INSERT INTO buggidaily (userid, token, khep) VALUES ($userid, $token, $khep)";
    }
    $result = mysqli_query($conn, $q);

    if($result): header("Location:../buggi-daily.php");
    else: echo "Something Wrong";
    endif;
?>