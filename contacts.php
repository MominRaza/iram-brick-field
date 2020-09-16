<?php
    include('./db.php');
    if(isset($_GET['category'])):
        $category = $_GET['category'];
    endif;
    if(isset($_GET['search'])):
        $search = $_GET['search'];
    endif;
    
    if(isset($category)):
        $q = "select *from user, works where user.workid = works.workid and user.workid = $category";
    else: 
        $q = "select *from user, works where user.workid = works.workid";
    endif;
    
    $results = mysqli_query($conn, $q);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <link rel="stylesheet" href="./css/variables-dark.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/form.css">
    <link rel="stylesheet" href="./icons/material.css">
</head>

<body>
    <header>
        <a class='back' href="./index.php"><i class="material-icons">arrow_back</i></a>
        <h1>Contacts</h1>
    </header>
    <form class='search' action="./contacts.php">
        <?php if(isset($category)):?>
            <input type="hidden" name="category" value='<?php echo($category);?>'>
        <?php endif;?>
        <input type="search" name="search" id="search" placeholder="Search Contacts" value='<?php if(isset($search)): echo($search);endif;?>' required>
        <button type="submit"><i class="material-icons">search</i></button>
    </form>
    <ul class='chips'>
        <li class='chip <?php if(!isset($category)): echo('select'); endif;?>'><a href="./contacts.php">All</a></li>
        <?php
            $qw = "select *from works";
            $resultsw = mysqli_query($conn, $qw);
            while($roww = mysqli_fetch_assoc($resultsw)):
        ?>
            <li class='chip <?php if(isset($category)): if($roww['workid']==$category): echo('select'); endif;endif;?>'><a href="./contacts.php?category=<?php echo($roww['workid']); if(isset($search)): echo('&search='.$search);endif;?>"><?php echo($roww['work']);?></a></li>
        <?php endwhile;?>
        <div class="chips_size_fix"> </div>
    </ul>
    <ul>
    <?php while($row = mysqli_fetch_assoc($results)):
        if(isset($search)): 
            if(!preg_match("/{$search}/i", $row['name'])):
                continue;
            endif; 
        endif;?>
        <li class='card'>
            <a href='./contact.php?contact=<?php echo($row['userid']);?>'>
                <div class="left">
                    <p class='work'><?php echo($row['work']);?></p>
                </div>
                <p class="title">
                    <span class='name'><?php echo($row['name']);?>,</span>
                    <span class='address'><?php echo($row['address']);?></span>
                </p>
                <p class='number'><?php echo($row['number']);?></p>
            </a>
        </li>
        <?php endwhile;?>
    </ul>

    <a class='fab' href="./add/add-contact.php"><i class="material-icons">add</i>Add Contact</a>
    <div class="fab_size_fix"></div>
    <!-- <script src='./js/data.js'></script>
    <script src="./js/contacts.js"></script> -->
</body>

</html>