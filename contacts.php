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
    <link rel="stylesheet" href="./css/variables.css">
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
    <ul class='chips' id='scroll'>
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
                    <img class='avatar' src="./images/<?php echo($row['icon']);?>" alt="<?php echo($row['work']);?>">
                </div>
                <p class="title">
                    <?php echo($row['name']);?>,
                    <?php echo($row['address']);?>
                </p>
                <p class='number'><?php echo($row['number']);?></p>
            </a>
        </li>
        <?php endwhile;?>
    </ul>

    <a class='fab' href="./add/add-contact.php"><i class="material-icons">add</i>Add Contact</a>
    <div class="fab_size_fix"></div>
    
    <script>
        $scroll = document.getElementById('scroll');
        <?php if(isset($category)){
            switch($category) {
                case 3:
                    echo('$scroll.scrollLeft = 50;');
                break;
                case 4:
                    echo('$scroll.scrollLeft = 100;');
                break;
                case 5:
                    echo('$scroll.scrollLeft = 200;');
                break;
                case 6:
                    echo('$scroll.scrollLeft = 300;');
                break;
                case 7:
                    echo('$scroll.scrollLeft = 400;');
                break;
                case 8:
                    echo('$scroll.scrollLeft = 500;');
                break;
                case 9:
                    echo('$scroll.scrollLeft = 600;');
                break;
                case 10:
                    echo('$scroll.scrollLeft = 700;');
                break;
            }
        }?>
    </script>
</body>

</html>