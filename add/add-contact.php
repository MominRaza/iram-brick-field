<?php
    include('../db.php');
    $q = "select *from works";
    $results = mysqli_query($conn, $q);
    
    if(isset($_GET['contact'])){
        $contactid = $_GET['contact'];
        $qc = "select *from user WHERE userid = $contactid";
        $resultsc = mysqli_query($conn, $qc);
        $contact = mysqli_fetch_array($resultsc);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contact</title>
    <link rel="stylesheet" href="../css/variables-dark.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../icons/material.css">
</head>

<body>
    <header>
    <a class='back' href="<?php
            if(isset($contact)):
                echo('../contact.php?contact=' . $contactid);
            else:
                echo('../contacts.php');
            endif;
        ?>"><i class="material-icons">arrow_back</i></a>
    <h1>
        <?php
            if(isset($contact)):
                echo('Edit Contact');
            else:
                echo('Add Contact');
            endif;
        ?>
    </h1></header>
    <form action="../handles/add-contact-handle.php" method="post">
        
        <input type="hidden" name="contactid" id='contactid' value='<?php if(isset($contactid)){echo($contactid);}?>'>
        <p class="label">Name</p>
        <input type="text" name="name" id="name" placeholder="Enter Name" value='<?php if(isset($contact)){echo($contact['name']);}?>' required>
        <p class="label">Address</p>
        <input type="text" name="address" id="address" placeholder="Enter Address" value='<?php if(isset($contact)){echo($contact['address']);}?>' required>
        <p class="label">Work</p>
        <select name="work" id="work" required>
            <option value=''>Select Work</option>
            <?php while($row = mysqli_fetch_assoc($results)):?>
                <option value="<?php echo($row['workid']);?>" <?php if(isset($contact)){if($contact['workid'] == $row['workid']){echo('selected');}}?>><?php echo($row['work']);?></option>
            <?php endwhile;?>
        </select>
        <p class="label">Mobile Number</p>
        <input type="tel" name="number" id="number" placeholder="Enter Mobile Number" value='<?php if(isset($contact)){echo($contact['number']);}?>' required>
        <input type="submit" value="Save Contact">
    </form>
    <!-- <script src="./js/data.js"></script>
    <script src="./js/add-contact.js"></script> -->
</body>

</html>