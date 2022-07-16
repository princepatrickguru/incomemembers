<?php 
session_start();

if(!isset($_SESSION['id']) || empty($_SESSION['id'])){

    header("Location: ../login.php"); 
    exit();

}else{
	
	$user_query = sprintf("select * from users where id='%s' ",  $_SESSION['id']); 
	$user_result = mysqli_query($conn, $user_query);
	
	
    if(mysqli_num_rows($user_result) > 0) {
        $user_row = mysqli_fetch_assoc($user_result);
        
        $user_id = $user_row['id'];
        $user_name = $user_row['name'];
        $user_phone = $user_row['phone'];
        $user_email = $user_row['email'];
        $user_password = $user_row['password'];
        $user_balance = $user_row['balance'];
    }else{
        header("Location: ../login.php?noacc"); 
        exit();
    }

    $user_active_investment_count = countInvestment($user_id, $statusRunning);
    $user_active_investment_amount = totalInvestment($user_id, $statusRunning);
    $user_active_withdrawal_amount = totalWithdrawal($user_id, $statusSuccessful);
}


?>

