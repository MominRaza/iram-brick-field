<?php

$host = 'localhost';
$user_name = 'root';
$password = '';
$database_name = 'iram';

$conn = mysqli_connect($host, $user_name, $password, $database_name);

// // mysqli_select_db($conn, 'momin');
// $q = "select *from user";
// $results = mysqli_query($conn, $q);

// while($row = mysqli_fetch_assoc($results)) {
//     echo "id: " . $row['id'] . '<br/>'.
//          'Book Name : '. $row['book_name']."<br>".
//          'Author name : '. $row['author_name']."<br>";
// }

if(!$conn): echo "connection failed"; endif;

?>