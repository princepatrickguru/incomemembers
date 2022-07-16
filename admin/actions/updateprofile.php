<?php include("../include/session.php"); 
    if(isset($_POST["name"])){
        $user_name = test_input($_POST["name"]);
        $user_phone = test_input($_POST["phone"]);

        $sql = sprintf('UPDATE INTO users SET name="%s", phone="%s" ', $user_name, $user_phone	);					
		mysqli_query($conn, $sql);
    }    
?>