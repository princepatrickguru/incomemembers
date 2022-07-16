<?php include("./session.php"); 
    if(isset($_POST["updateprofile"])){

        $user_name = test_input($_POST["name"]);
        $user_phone = test_input($_POST["phone"]);

        $sql = sprintf('UPDATE INTO users SET name="%s", phone="%s" ', $user_name, $user_phone	);					
		mysqli_query($conn, $sql);

        $_SESSION["alert_type"] = "success";
        $_SESSION["alert_msg"] = "Profile Updated Successfully";

        // $sql = sprintf('INSERT INTO users (name, phone) VALUES ("%s", "%s")', $user_name, $user_phone);	
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
        <title>Profile - Income Members</title>
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
                                            <label for="name">Name</label>
                                            <input type="text" value="<?php echo $user_name; ?>" id="name" name="name" placeholder="Name" class="form-control" required >
                                        </div>
										<div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" value="<?php echo $user_phone; ?>" id="phone" name="phone" placeholder="Phone number" class="form-control" required >
                                        </div>
										<div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" value="<?php echo $user_email; ?>" id="email" name="email" placeholder="Email" class="form-control" readonly >
                                        </div>
									</div>
                                    <div class="card-footer d-flex align-items-right justify-content-between">
                                        <div class="form-group">
											<input type="submit" class="btn btn-primary" name="updateprofile" value="Update" >
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
