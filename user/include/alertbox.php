<?php
if(isset($_SESSION["alert_type"])){
?>
<div class="row">
    <div style="width:100%;" class="alert alert-<?php echo $_SESSION["alert_type"]; ?> alert-dismissible">
        <p class="">
            <?php echo $_SESSION["alert_msg"]; ?>
        </p>
    </div>
</div>
<?php
unset($_SESSION["alert_type"]);
}
?>

