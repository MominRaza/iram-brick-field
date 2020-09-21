<header>
    <?php if(isset($back)){?>
        <a class='back' href="<?=$back;?>"><i class="material-icons">arrow_back</i></a>
    <?php } if(isset($option)){?>
        <a class="option" href="<?=$option;?>"><i class="material-icons">done_all</i></a>
    <?php }?>
    <h1><?=$title;?></h1>
</header>