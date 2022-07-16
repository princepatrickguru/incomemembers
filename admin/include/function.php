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

    if($result_settings= mysqli_query($conn, $sql_settings)){;
          return $result_settings;
    }
}



function getUserById($id) {
  require("config.php");
    $sql_sprint = sprintf("SELECT * FROM users WHERE id=%s", $id);
    if($result_query= mysqli_query($conn, $sql_sprint)){;
          return $result_query;
    }
}

function getPendingDeposit() {
  require("config.php");
    $status = "Pending";
    $sql_sprint = sprintf("SELECT * FROM deposit WHERE status='%s' ORDER BY id DESC", $status);

    $result_query= mysqli_query($conn, $sql_sprint);
          return $result_query;
    
}


function getApproveDeposit() {
  require("config.php");
    $status = "Success";
    $sql_sprint = sprintf("SELECT * FROM deposit WHERE status='%s' ORDER BY id DESC", $status);

    if($result_query= mysqli_query($conn, $sql_sprint)){;
          return $result_query;
    }
}


function getFailedDeposit() {
  require("config.php");
    $status = "Failed";
    $sql_sprint = sprintf("SELECT * FROM deposit WHERE status='%s' ORDER BY id DESC", $status);

    if($result_query= mysqli_query($conn, $sql_sprint)){;
          return $result_query;
    }
}


?>

