<?php @session_start(); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div class="row ms-5 mt-2">
    <a href="./Home.php" class="btn btn-primary col-1 m-1 my-auto w-auto">Home</a>
    
    <?php 
    if (isset($_SESSION["username"])) {
        ?> <div class="col-3 my-auto w-auto">Welcome back, <?= $_SESSION["username"]?> </div> <?php
    }
    else {?>
        <a href="./Login.php" class="btn btn-primary col-1 m-1 my-auto w-auto">Log in</a>
        <a href="./Signup.php" class="btn btn-primary col-1 m-1 my-auto w-auto">Sign up</a>
    <?php };?>
</div>