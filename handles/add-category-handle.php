<?php
    include('../db.php'); 
    $workid = $_POST['workid'];
    $work = $_POST['work'];
    $rate = $_POST['rate'];
    
    if($workid!=null){
        $q = "UPDATE works SET work = '$work', rate = $rate WHERE workid = $workid";
    }
    else{
        $q = "INSERT INTO works (work, rate) VALUES ('$work', $rate)";    
    }
    $result = mysqli_query($conn, $q);
    if($result): header("Location:../category.php");
    else: echo "Something Wrong";
    endif;
?>