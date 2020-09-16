<?php
    include('../db.php');
    $q = "select *from user where workid = 8";
    $results = mysqli_query($conn, $q);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Kacchi Daily</title>
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../icons/material.css">
</head>

<body>
    <header>
        <a href="../kacchi-daily.php" class="back"><i class="material-icons">arrow_back</i></a>
        <h1>Add Kacchi Daily</h1>
    </header>
    <form action="../handles/add-kacchi-daily-handle.php" method="post">
        <p class="label">Name</p>
        <select name="name" id="name" required>
            <option value="">Select Name</option>
            <?php while($row = mysqli_fetch_assoc($results)):?>
                <option value="<?php echo($row['userid']);?>"><?php echo($row['name']);?></option>
            <?php endwhile;?>
        </select>
        <div class="row">
            <div class="col-11">
                <p class="label">Row</p>
                <input type="number" name="row" id="row" placeholder="Enter Row" required>
            </div>
            <div class="col-2 middle">X</div>
            <div class="col-11">
                <p class="label">Column</p>
                <input type="number" name="column" id="Column" placeholder="Enter Column" required>
            </div>
        </div>
        <div class="label">Extra</div>
        <div class="row">
            <div class="col-4">
                <input type="radio" name="plus" id="plus" value="0"><label class='radio' for="plus">+</label>
            </div>
            <div class="col-4">
                <input type="radio" name="plus" id="minus" value="1"><label class='radio' for="minus">-</label>
            </div>
            <div class="col-16">
                <input type="number" name="plusvalue" id="Plus" placeholder="Plus / Minus">
            </div>
        </div>
        <input type="checkbox" name="pacchisa" id="pacchisa"><label for="pacchisa">Remove Pacchisa</label>
        <input type="submit" value="Add">
    </form>
</body>

</html>