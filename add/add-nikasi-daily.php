<?php
    include('../db.php');
    $q = "select *from user where workid = 7";
    $results = mysqli_query($conn, $q);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Nikasi Daily</title>
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../icons/material.css">
</head>

<body>
    <header>
        <a href="../nikasi-daily.php" class="back"><i class="material-icons">arrow_back</i></a>
        <h1>Add Nikasi Daily</h1>
    </header>
    <form action="../handles/add-nikasi-daily-handle.php" method='post'>
        <p class="label">Name</p>
        <select name="name" id="name" required>
            <option value="">Select Name</option>
            <?php while($row = mysqli_fetch_assoc($results)):?>
                <option value="<?php echo($row['userid']);?>"><?php echo($row['name']);?></option>
            <?php endwhile;?>
        </select>
        <p class="label">Kali</p>
        <input type="number" name="kali" id="kali" placeholder="Enter Kali" required>
        <p class="label">Rose</p>
        <input type="number" name="rose" id="rose" placeholder="Enter Rose" required>
        <input type="submit" value="Add">
    </form>
</body>

</html>