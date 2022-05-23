<?php @session_start(); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div class="row ms-5 mt-2">
    <a href="./Home.php" class="btn btn-primary col-1 m-1 my-auto w-auto">Home</a>
    
    <?php //Check if signing out
    if (isset($_GET["logout"])) {
        session_destroy();
        header("Location: ./Home.php");
        die();
    }

    //Check if signed in
    if (isset($_SESSION["username"])) {
        ?>
        <a href="./NewChat.php" class="btn btn-success col-2 m-1 my-auto w-auto">Create new chatroom?</a>
        
        <!--check if image is null, show image else show placeholder-->
        <?php if (isset($_SESSION["userImg"])) {?>
        <img style="max-width: 5%" src="data:image/jpeg;base64,<?= base64_encode($_SESSION["userImg"])?>"/>
        <?php } else { ?>
        <img style="max-width: 5%" class="col-2" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png" alt="blank user">
        <?php } ?>

        <div class="col-3 my-auto w-auto">
            Welcome back, <?= $_SESSION["username"]?> <br>
            <a href="./Home.php?logout=true">Sign out?</a>
        </div> 
        <?php
    }
    //Else show log-in/sign-up
    else {?>
        <a href="./Login.php" class="btn btn-primary col-1 m-1 my-auto w-auto">Log in</a>
        <a href="./Signup.php" class="btn btn-primary col-1 m-1 my-auto w-auto">Sign up</a>
    <?php };?>
</div>