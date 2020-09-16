<?php
    include('../db.php'); 
    $buggiid = $_GET['buggiid'];

    $q = "DELETE FROM buggidaily WHERE buggiid = $buggiid";
    $result = mysqli_query($conn, $q);

    if($result):
        header('Location:../buggi-daily.php'); 
    else:
        echo('Something wrong!');
    endif;
?>