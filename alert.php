<span class="alert">
    <?php 
    if(isset($_GET["success"])){
    ?>
        <p class="text-success">Account Opening Successful!</p>
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
</span>