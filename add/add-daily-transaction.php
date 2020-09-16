<?php
    include('../db.php');
    if(isset($_GET['contact'])):
        $contact = $_GET['contact'];
    endif;
    $q = "select *from user, works where user.workid = works.workid";
    $results = mysqli_query($conn, $q);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pain</title>
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../icons/material.css">
</head>

<body>
    <header>
        <a class='back' href="<?php if(isset($contact)):echo('../contact.php?contact='.$contact);else:echo('../daily-transaction.php');endif;?>"><i class="material-icons">arrow_back</i></a>
        <h1>Add Daily Transaction</h1>
    </header>
    <form action="../handles/add-daily-transaction-handle.php" method="post">
        <p class="label">Name, Work</p>
        <select name="name" id="name" required>
            <option value="">Select Name, Work</option>
            <?php while($row = mysqli_fetch_assoc($results)): ?>
                <option value="<?php echo($row['userid']);?>" <?php if(isset($contact)):if($contact == $row['userid']):echo('selected');endif;endif;?>><?php echo($row['name']);?>, <?php echo($row['work']);?></option>
            <?php endwhile;?>
        </select>
        <p class="label">Debit / Credit</p>
        <select name="type" id="type" required>
            <option value="">Select Type</option>
            <option value="1">Credit</option>
            <option value="2">Debit</option>
            <option value="3">Pakad</option>
        </select>
        <p class="label">Detail</p>
        <input type="text" name="detail" id="detail" placeholder="Enter Detail" required>
        <p class="label">Amount</p>
        <input type="number" name="amount" id="amount" placeholder="Enter Amount" required>
        <input type="submit" value="Add Transaction">
    </form>
</body>

</html>