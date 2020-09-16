<?php
    $previus = $_GET['previus'];
    $income = $_GET['income'];
    $pakad = $_GET['pakad'];
    $paid = $_GET['paid'];

    $amount = $previus + $income - $pakad - $paid;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Total</title>
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../icons/material.css">
</head>

<body>
    <header>
        <a class='back' href="../daily-transaction.php"><i class="material-icons">arrow_back</i></a>
        <h1>Transaction Total</h1>
    </header>
    <form action="../handles/add-transactiontotal-handle.php" method="post">
        <p class="label">Previus Amount</p>
        <input type="number" name="previus" value='<?php echo($previus);?>' readonly='readonly'>
        <p class="label">Today Income</p>
        <input type="number" name="income" value='<?php echo($income);?>' readonly='readonly'>
        <p class="label">Pakad</p>
        <input type="number" name="pakad" value='<?php echo($pakad);?>' readonly='readonly'>
        <p class="label">Today Paid</p>
        <input type="number" name="paid" value='<?php echo($paid);?>' readonly='readonly'>
        <p class="label">Remaining Amount</p>
        <input type="number" name="amount" value='<?php echo($amount);?>' readonly='readonly'>
        <input type="submit" value="Save">
    </form>
</body>

</html>