<?php
    $quantity = $_GET['quantity'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Kachhi</title>
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../icons/material.css">
</head>

<body>
    <header>
        <a class='back' href="../kacchi-daily.php"><i class="material-icons">arrow_back</i></a>
        <h1>Add Kacchi</h1>
    </header>
    <form action="../handles/add-kacchi-handle.php" method="post">
        <p class="label">Quantity</p>
        <input type="number" name="quantity" value='<?php echo($quantity);?>' readonly='readonly'>
        <input type="submit" value="Save">
    </form>
</body>

</html>