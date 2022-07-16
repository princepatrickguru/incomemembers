<?php 
require("./include/config.php");
require("./include/function.php"); 
require("./include/session.php");

    if(isset($_POST["trxref"])){
        $poptype = test_input($_POST["poptype"]);
        $popamount = test_input($_POST["popamount"]);
        $popref = test_input($_POST["popref"]);

        $date = date('d-m-Y');
        $status = "Pending";
        $sql = sprintf('INSERT INTO deposit (user, type, amount, receipt, status, date) VALUES ("%s", "%s", "%s", "%s", "%s", "%s")', $user_id, $poptype, $popamount, $popref, $status, $date);	
		mysqli_query($conn, $sql);

        
        $_SESSION["alert_type"] = "success";
        $_SESSION["alert_msg"] = "Profile Updated Successfully";
        
        header("location: dashboard.php");
        die();
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
        <title>Deposit - Income Members</title>
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
                        <h1 class="mt-4">Deposit</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Deposit</li>
                        </ol>
						<?php include("include/alertbox.php"); ?>
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-white text-black mb-4" id="deposit_form">
                                    <div class="card-body">
										<div class="form-group">
                                            <label for="type">Deposit Option</label>
                                            <select class="form-control" name="type" id="type">
                                                <?php 
                                                    $bank_option = getBankOption();
                                                    while( $row = mysqli_fetch_assoc($bank_option)){
                                                ?>
                                                <option value="<?php echo $row["wallet"]; ?>"><?php echo $row["name"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label for="Amount"></label>
                                            <input type="text" min="" max="" value="" id="amount" name="amount" placeholder="amount" class="form-control" required >
                                        </div>
										
									</div>
                                    <div class="card-footer d-flex align-items-right justify-content-between">
                                        <div class="form-group">
											<input type="submit" class="btn btn-primary" id="proceed" name="deposit" value="Proceed" >
										</div>
                                    </div>
                                </div>






                                <div class="card bg-white text-black mb-4" id="deposit_detail" style="display:none;">
                                    <div class="card-body">
										<p>Please make payment of $<span id="displayamount"> </span> to <span id="displaywallet"></span>.</p>
                                       
									</div>
                                    <div class="card-footer d-flex align-items-right justify-content-between">
                                        <div class="form-group">
											<button class="btn btn-primary" id="ipay" >I have make this payment</button>
										</div>
                                    </div>
                                </div>






                                <div class="card bg-white text-black mb-4" id="pop_form" style="display:none;">
                                    <form action="" method="post">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="type">Deposit Option</label>
                                                <select class="form-control" name="poptype" id="poptype">
                                                    <?php 
                                                        $bank_option = getBankOption();
                                                        while( $row = mysqli_fetch_assoc($bank_option)){
                                                    ?>
                                                    <option value="<?php echo $row["wallet"]; ?>, <?php echo $row["name"]; ?>"><?php echo $row["name"]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Amount"></label>
                                                <input type="text" id="popamount" name="popamount" placeholder="amount" class="form-control" required >
                                            </div>
                                            <div class="form-group">
                                                <label for="Amount"></label>
                                                <input type="text" id="popref" name="popref" placeholder="Transaction Refrence" class="form-control" required >
                                            </div>
                                            
                                        </div>
                                        <div class="card-footer d-flex align-items-right justify-content-between">
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary" id="trxref" name="trxref" value="Submit" >
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
            const ipay = document.getElementById("ipay");
            const proceed = document.getElementById("proceed");
            const deposit_detail = document.getElementById("deposit_detail");
            const displaywallet = document.getElementById("displaywallet");
            const displayamount = document.getElementById("displayamount");
            const deposit_form = document.getElementById("deposit_form");
            const pop_form = document.getElementById("pop_form");

            proceed.addEventListener("click", ()=>{
                const type = document.getElementById("type");
                const amount = document.getElementById("amount");
                deposit_form.style.display = "none";
                displayamount.textContent = amount.value;
                displaywallet.textContent = type.value;
                deposit_detail.style.display = "block";
                
            })
            ipay.addEventListener("click", ()=>{
                
                deposit_form.style.display = "none";
                deposit_detail.style.display = "none";
                pop_form.style.display = "block";
                
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
