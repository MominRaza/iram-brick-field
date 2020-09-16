<?php
    include('../db.php');
    $contactid = $_POST['contactid'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $work = $_POST['work'];
    $number = $_POST['number'];

    if($contactid!=null){
        $q = "UPDATE user SET name = '$name', address = '$address', workid = $work, number = $number WHERE userid = $contactid";
    }
    else{
        $q = "INSERT INTO user (name, address, workid, number) VALUES ('$name', '$address', $work, $number)";
    }
    $result = mysqli_query($conn, $q);
    if($result):
        if($contactid!=null){
            header("Location:../contact.php?contact=" . $contactid);
        }
        else{
            header("Location:../contacts.php");
        } 
    else: echo "Something Wrong";
    endif;
?>