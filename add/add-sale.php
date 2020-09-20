<?php
    include('../db.php');

    $q = "select *from user, works where user.workid = works.workid";
    $results = mysqli_query($conn, $q);

    $g = "select *from user where workid = 10";
    $resultsg = mysqli_query($conn, $g);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Sale</title>
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../icons/material.css">
</head>

<body>
    <header>
        <a class='back' href="<?php echo('../sale-account.php');?>"><i class="material-icons">arrow_back</i></a>
        <h1>Add Sale</h1>
    </header>
    <form action="../handles/add-sale-handle.php" method="post">
        <p class="label">Name, Work</p>
        <select name="name" id="name" required>
            <option value="">Select Name, Work</option>
            <?php while($row = mysqli_fetch_assoc($results)): ?>
                <option value="<?php echo($row['userid']);?>"><?php echo($row['name']);?>, <?php echo($row['work']);?></option>
            <?php endwhile;?>
        </select>

        <input type="checkbox" name="awwalcheckbox" id="awwalcheckbox" onclick="checkboxclick(1)"><label for="awwalcheckbox">Awwal</label>
        <input type="checkbox" name="doyamcheckbox" id="doyamcheckbox" onclick="checkboxclick(2)"><label for="doyamcheckbox">Doyam</label>
        <input type="checkbox" name="peelacheckbox" id="peelacheckbox" onclick="checkboxclick(3)"><label for="peelacheckbox">Peela</label>
        <br>
        <input type="checkbox" name="kharapeelacheckbox" id="kharapeelacheckbox" onclick="checkboxclick(4)"><label for="kharapeelacheckbox">Khara Peela</label>
        <input type="checkbox" name="chatkacheckbox" id="chatkacheckbox" onclick="checkboxclick(5)"><label for="chatkacheckbox">Chatka</label>
        <input type="checkbox" name="addhacheckbox" id="addhacheckbox" onclick="checkboxclick(6)"><label for="addhacheckbox">Addha</label>
        
        <div class="row hide" id='awwal1'>
            <div class="col-12">
                <p class="label">Awwal</p>
                <input type="number" name="awwal" disabled id='awwal' placeholder="Awwal Quantity" required>
            </div>
            <div class="col-12">
                <p class="label">Awwal Rate</p>
                <input type="number" name="awwalrate" disabled id='awwalrate' placeholder="Awwal Rate" required>
            </div>
        </div>
        <div class="row hide" id='doyam1'>
            <div class="col-12">
                <p class="label">Doyam</p>
                <input type="number" name="doyam" disabled id='doyam' placeholder="Doyam Quantity" required>
            </div>
            <div class="col-12">
                <p class="label">Doyam Rate</p>
                <input type="number" name="doyamrate" disabled id='doyamrate' placeholder="Doyam Rate" required>
            </div>
        </div>
        <div class="row hide" id='peela1'>
            <div class="col-12">
                <p class="label">Peela</p>
                <input type="number" name="peela" disabled id='peela' placeholder="Peela Quantity" required>
            </div>
            <div class="col-12">
                <p class="label">Peela Rate</p>
                <input type="number" name="peelarate" disabled id='peelarate' placeholder="Peela Rate" required>
            </div>
        </div>
        <div class="row hide" id='kharapeela1'>
            <div class="col-12">
                <p class="label">Khara Peela</p>
                <input type="number" name="kharapeela" disabled id='kharapeela' placeholder="Khara Peela Quantity" required>
            </div>
            <div class="col-12">
                <p class="label">Khara Peela Rate</p>
                <input type="number" name="kharapeelarate" disabled id='kharapeelarate' placeholder="Khara Peela Rate" required>
            </div>
        </div>
        <div class="row hide" id='chatka1'>
            <div class="col-12">
                <p class="label">Chatka</p>
                <input type="number" name="chatka" disabled id='chatka' placeholder="Chatka Quantity" required>
            </div>
            <div class="col-12">
                <p class="label">Chatka Rate</p>
                <input type="number" name="chatkarate" disabled id='chatkarate' placeholder="Chatka Rate" required>
            </div>
        </div>
        <div class="row hide" id='addha1'>
            <div class="col-12">
                <p class="label">Addha</p>
                <input type="number" name="addha" disabled id='addha' placeholder="Addha Quantity" required>
            </div>
            <div class="col-12">
                <p class="label">Addha Rate</p>
                <input type="number" name="addharate" disabled id='addharate' placeholder="Addha Rate" required>
            </div>
        </div>

        <p class="label">Chalan Number</p>
        <input type="number" name="chno" placeholder="Enter Chalan Number" required>
        <p class="label">Location</p>
        <input type="text" name="location" placeholder="Enter Location" required>

        <input type="checkbox" name="gadiwancheckbox" id="gadiwancheckbox" onclick="checkboxclick(7)"><label for="gadiwancheckbox">Khud</label>
        
        <div id='gadiwan1'>
            <p class="label">Gadiwan Name</p>
            <select name="gadiwan" id='gadiwan' required>
                <option value="">Select Name</option>
                <?php while($rowg = mysqli_fetch_assoc($resultsg)): ?>
                    <option value="<?php echo($rowg['userid']);?>"><?php echo($rowg['name']);?></option>
                <?php endwhile;?>
            </select>
            <p class="label">Gadiwan Rate</p>
            <input type="number" name="gadiwanrate" id='gadiwanrate' placeholder="Addha Rate" required>
        </div>

        <input type="submit" value="Add Transaction">
    </form>

    <script src="../js/main.js"></script>
</body>

</html>