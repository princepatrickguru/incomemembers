<span class="alert">
    <?php 
    if(isset($_GET["success"])){
    ?>
        <p class="text-success"> You've Successfully Open an Account wiith Income Members!</p>
    <?php
    }
    ?>

    <?php 
    if(isset($_GET["exist"])){
    ?>
        <p class="text-danger">Email or phone number already exist!</p>
    <?php
    }
    ?>

    <?php 
    if(isset($_GET["invalid"])){
    ?>
        <p class="text-danger">Invalid Login!</p>
    <?php
    }
    ?>

    <?php 
    if(isset($_GET["noacc"])){
    ?>
        <p class="text-danger">Account Not Found!</p>
    <?php
    }
    ?>



</span>