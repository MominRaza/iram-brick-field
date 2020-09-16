<?php
    $quantity = $_GET['quantity'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Bharai</title>
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../icons/material.css">
</head>

<body>
    <header>
        <a class='back' href="../buggi-daily.php"><i class="material-icons">arrow_back</i></a>
        <h1>Add Bharai</h1>
    </header>
    <form action="../handles/add-bharai-handle.php" method="post">
        <p class="label">Quantity</p>
        <input type="number" name="quantity" value='<?php echo($quantity);?>' readonly='readonly'>
        <p class="label">Rose</p>
        <input type="number" name="rose" placeholder='Rose'>
        <p class="label">Kali</p>
        <input type="number" name="kali" placeholder='Kali'>
        <input type="submit" value="Save">
    </form>
</body>

</html>