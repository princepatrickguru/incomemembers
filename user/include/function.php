<?php
require("config.php");

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = strip_tags($data);
  return $data;
}

function getBankOption() {
  require("config.php");
    $one = 1;
    $sql_settings = sprintf("SELECT * FROM deposit_options WHERE status=%s", $one);

    if($result_settings= mysqli_query($conn, $sql_settings)){
          return $result_settings;
    }
}

function getMyDeposit($user) {
  require("config.php");
    $sql_sprint = sprintf("SELECT * FROM deposit WHERE user=%s ORDER BY id DESC", $user);

    if($result_query= mysqli_query($conn, $sql_sprint)){
          return $result_query;
    }
}

function getplans() {
  require("config.php");
    $one = 1;
    $sql_sprint = sprintf("SELECT * FROM plan WHERE status=%s ORDER BY id DESC", $one);

    if($result_query= mysqli_query($conn, $sql_sprint)){
          return $result_query;
    }
}

function getPlansName($planid) {
  require("config.php");
    $sql_sprint = sprintf("SELECT name FROM plan WHERE id=%s", $planid);

    if($result_query= mysqli_query($conn, $sql_sprint)){
        $row = mysqli_fetch_assoc($result_query);
          return $row["name"];
    }
}

function getInvstID($user, $plan, $day, $amount) {
  require("config.php");
    $sql_sprint = sprintf("SELECT id FROM investment WHERE user='%s' AND plan='%s' AND day='%s' AND amount='%s' ORDER BY id DESC LIMIT 1", $user, $plan, $day, $amount);

    if($result_query= mysqli_query($conn, $sql_sprint)){
        $row = mysqli_fetch_assoc($result_query);
          return $row["id"];
    }
}

function getPercent($period) {
  require("config.php");
    $sql_sprint = sprintf("SELECT $period FROM plan");

    if($result_query= mysqli_query($conn, $sql_sprint)){
        $row = mysqli_fetch_assoc($result_query);
          return $row[$period];
    }
}

function countInvestment($user, $status){
    require("config.php");
    $sql_sprint = sprintf("SELECT * FROM investment WHERE user='%s' and status='%s'", $user, $status);

    if($result_query= mysqli_query($conn, $sql_sprint)){
        $count = mysqli_num_rows($result_query);
          return $count;
    }
}

function totalInvestment($user, $status){
    require("config.php");
    $sql_sprint = sprintf("SELECT SUM(amount) AS totalinvest FROM investment WHERE user='%s' and status='%s'", $user, $status);

    if($result_query= mysqli_query($conn, $sql_sprint)){
        $row = mysqli_fetch_assoc($result_query);
          return $row["totalinvest"];
    }
}

function totalWithdrawal($user, $status){
    require("config.php");
    $sql_sprint = sprintf("SELECT SUM(amount) AS totalwithdrawal FROM withdrawal WHERE user='%s' and status='%s'", $user, $status);

    if($result_query= mysqli_query($conn, $sql_sprint)){
        $row = mysqli_fetch_assoc($result_query);
          return $row["totalwithdrawal"];
    }
}

function getAllUserInvestment($user, $status){
  require("config.php");
  $sql_sprint = sprintf("SELECT * FROM investment WHERE user='%s' and status='%s'", $user, $status);

  if($result_query= mysqli_query($conn, $sql_sprint)){
        return $result_query;
  }
}






?>

