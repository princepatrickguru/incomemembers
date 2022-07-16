<?php include("./session.php"); 
    if(isset($_POST["updatepassword"])){

        $user_opassword = test_input($_POST["password"]);
        $user_npassword = test_input($_POST["npassword"]);
        $user_cpassword = test_input($_POST["cpassword"]);

        if($user_password == $user_opassword){
            $sql = sprintf('UPDATE users SET password="%s" WHERE id="%s"', $user_cpassword, $user_id);					
            mysqli_query($conn, $sql);



            $_SESSION["alert_type"] = "success";
            $_SESSION["alert_msg"] = "Password Updated Successfully";
            header("Location: settings.php");
            exit();
        }else{


            $_SESSION["alert_type"] = "danger";
            $_SESSION["alert_msg"] = "Incorrect Password";
            header("Location: settings.php");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Settings - Income Members</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
		<?php include("topnav.php"); ?>
		<div id="layoutSidenav">
            <?php include("sidebar.php"); ?>
			<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Profile</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
						<?php include("include/alertbox.php"); ?>
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <form action="" method="post">
                                <div class="card bg-white text-black mb-4">
                                    <div class="card-body">
										<div class="form-group">
                                            <label for="name">Current Password</label>
                                            <input type="password" value="" id="password" name="password" placeholder="Current Password" class="form-control" required >
                                        </div>
										<div class="form-group">
                                            <label for="phone">New Password</label>
                                            <input type="password" value="" id="npassword" name="npassword" placeholder="New Password" class="form-control" required >
                                        </div>
										<div class="form-group">
                                            <label for="email">Comfirm Password</label>
                                            <input type="password" value="" id="cpassword" name="email" placeholder="Comfirm Password" class="form-control" required >
                                            <span id="report"></span>
                                        </div>
									</div>
                                    <div class="card-footer d-flex align-items-right justify-content-between">
                                        <div class="form-group">
											<input type="submit" id="updatepassword" class="btn btn-primary" name="updatepassword" value="Update" >
										</div>
                                    </div>
                                    </form>
                                </div>
                            </div>

							
                        </div>
                    </div>
                </main>
                <?php include("footer.php"); ?>
            </div>
        </div>
        <script>
            const npassword = document.getElementById("npassword")
            const cpassword = document.getElementById("cpassword")
            const report = document.getElementById("report");
            const updatepassword = document.getElementById("updatepassword");

            
            cpassword.addEventListener("keyup", ()=>{
                if(cpassword.value.length > 3){
                        if(npassword.value != cpassword.value){
                            report.className = "text-danger"
                            report.textContent = "Password do not match"
                            updatepassword.setAttribute("disabled","true")
                        }else{
                            report.className = "text-success"
                            report.textContent = "Password match"
                            updatepassword.removeAttribute("disabled")
                        }
                }        
            })
            

            
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
