<?php
    include('../db.php'); 
    $userid = $_POST['name'];

    $awwalcheckbox = isset($_POST['awwalcheckbox']) ? true : false;
    $doyamcheckbox = isset($_POST['doyamcheckbox']) ? true : false;
    $peelacheckbox = isset($_POST['peelacheckbox']) ? true : false;
    $kharapeelacheckbox = isset($_POST['kharapeelacheckbox']) ? true : false;
    $chatkacheckbox = isset($_POST['chatkacheckbox']) ? true : false;
    $addhacheckbox = isset($_POST['addhacheckbox']) ? true : false;

    $chno = $_POST['chno'];
    $location = $_POST['location'];
    $gadiwan = $_POST['gadiwan'];

    $q1 = "INSERT INTO sale (userid, ";
    $q2 = "chno, location) VALUES ($userid, ";
    $q3 = "$chno, '$location')";

    if($awwalcheckbox){
        $awwal = $_POST['awwal'];
        $awwalrate = $_POST['awwalrate'];
        $q1 = $q1."awwal, awwalrate, ";
        $q2 = $q2."$awwal, $awwalrate, ";
    }
    if($doyamcheckbox){
        $doyam = $_POST['doyam'];
        $doyamrate = $_POST['doyamrate'];
        $q1 = $q1."doyam, doyamrate, ";
        $q2 = $q2."$doyam, $doyamrate, ";
    }
    if($peelacheckbox){
        $peela = $_POST['peela'];
        $peelarate = $_POST['peelarate'];
        $q1 = $q1."peela, peelarate, ";
        $q2 = $q2."$peela, $peelarate, ";
    }
    if($kharapeelacheckbox){
        $kharapeela = $_POST['kharapeela'];
        $kharapeelarate = $_POST['kharapeelarate'];
        $q1 = $q1."kharapeela, kharapeelarate, ";
        $q2 = $q2."$kharapeela, $kharapeelarate, ";
    }
    if($chatkacheckbox){
        $chatka = $_POST['chatka'];
        $chatkarate = $_POST['chatkarate'];
        $q1 = $q1."chatka, chatkarate, ";
        $q2 = $q2."$chatka, $chatkarate, ";
    }
    if($addhacheckbox){
        $addha = $_POST['addha'];
        $addharate = $_POST['addharate'];
        $q1 = $q1."addha, addharate, ";
        $q2 = $q2."$addha, $addharate, ";
    }
    
    $q = $q1.$q2.$q3;
    $result = mysqli_query($conn, $q);

    if($result): header("Location:../sale-account.php");
    else: echo "Something Wrong";
    endif;
?>