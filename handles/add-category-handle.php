<?php
    include('../db.php'); 
    $workid = $_POST['workid'];
    $work = $_POST['work'];
    $rate = $_POST['rate'];
    
    if($workid!=null):
        if($rate == null): $q = "UPDATE works SET work = '$work', rate = null WHERE workid = $workid";
        else: $q = "UPDATE works SET work = '$work', rate = $rate WHERE workid = $workid";
        endif;
        
    else: 
        if($rate == null): $q = "INSERT INTO works (work) VALUES ('$work')";
        else: $q = "INSERT INTO works (work, rate) VALUES ('$work', $rate)";
        endif;    
    endif;

    $result = mysqli_query($conn, $q);
    
    if($result): header("Location:../category.php");
    else: echo "Something Wrong";
    endif;
?>