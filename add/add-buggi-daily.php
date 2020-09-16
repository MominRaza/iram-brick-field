<?php
    include('../db.php');
    if(isset($_GET['contact'])):
        $contact = $_GET['contact'];
    endif;
    if(isset($_GET['buggiid'])):
        $buggiid = $_GET['buggiid'];
        $b = "select *from buggidaily WHERE buggiid = $buggiid";
        $resultsb = mysqli_query($conn, $b);
        $buggi = mysqli_fetch_array($resultsb);
    endif;
    $q = "select *from user where workid = 3";
    $results = mysqli_query($conn, $q);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Buggi Daily</title>
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../icons/material.css">
</head>

<body>
    <header>
        <a href="<?php if(isset($contact)):echo('../contact.php?contact='.$contact);else:echo('../buggi-daily.php');endif;?>" class="back"><i class="material-icons">arrow_back</i></a>
        <h1><?php
            if(isset($buggiid)):
                echo('Edit Buggi Daily');
            else:
                echo('Add Buggi Daily');
            endif;
        ?></h1>
    </header>
    <form action="../handles/add-buggi-daily-handle.php" method='post'>
        <input type="hidden" name="buggiid" id='buggiid' value='<?php if(isset($buggiid)){echo($buggiid);}?>'>
        <p class="label">Name</p>
        <select name="name" id="name" required>
            <option value="">Select Name</option>
            <?php while($row = mysqli_fetch_assoc($results)):?>
                <option value="<?php echo($row['userid']);?>" <?php if(isset($contact)):if($contact == $row['userid']):echo('selected');endif;elseif(isset($buggi)):if($buggi['userid'] == $row['userid']):echo('selected');endif;endif;?>><?php echo($row['name']);?></option>
            <?php endwhile;?>
        </select>
        <p class="label">Token</p>
        <input type="number" name="token" placeholder="Enter Token" value='<?php if(isset($buggi)):echo($buggi['token']);endif;?>' required>
        <p class="label">Khep</p>
        <input type="number" name="khep" placeholder="Enter Khep" value='<?php if(isset($buggi)):echo($buggi['khep']);endif;?>' required>
        <input type="submit" value="<?php if(isset($buggiid)):echo('Edit');else:echo('Add');endif; ?>">
    </form>
</body>

</html>