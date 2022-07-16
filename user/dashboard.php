<?php 
require("./include/config.php");
require("./include/function.php"); 
require("./include/session.php");



if(isset($_POST["buyplan"])){
    $amount = $_POST["amount"]; 
    $plan = $_POST["plan"]; 
    $period = $_POST["period"]; 
    $date = date("d-m-Y");
    $day = date("d");
    $month = date("m");
    $year = date("Y");
    $stop = new DateTime('now');
    $stop = $stop->modify('+'.$period.' month');
    $stop = "30-".$stop->format('m-Y');


        $sql = sprintf('INSERT INTO investment (user, plan, amount, day, month, year, date, stop, period, status) VALUES ("%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s")', $user_id, $plan, $amount, $day, $month, $year, $date, $stop, $period, $statusRunning);	
		mysqli_query($conn, $sql);

        $sqlibl = sprintf('UPDATE users SET balance= balance-%s WHERE id="%s"', $amount, $user_id	);					
        mysqli_query($conn, $sqlibl);

        $investment = getInvstID($user_id, $plan, $day, $amount);
        $days = "0";
        $dailyIncome = "0.00";
        
        $percentOne = getPercent("period1percent");
        $percentTwo = getPercent("period2percent");
        $percentThree = getPercent("period3percent");
        $percentFour = getPercent("period4percent");

        $dailyPercentPOne = $percentOne/30;
        $dailyPercentPTwo = $percentTwo/30;
        $dailyPercentPThree = $percentThree/30;
        $dailyPercentPFour = $percentFour/30;

        $periodOne = "Period 1";
        $periodTwo = "Period 2";
        $periodThree = "Period 3";
        $periodFour = "Period 4";


        $sql_running1 = sprintf('INSERT INTO runninginvestment (user, investment, plan, period, days, percent, dailypercent, dailyincome, status) VALUES ("%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s")', 
        $user_id, $investment, $plan, $periodOne, $days, $percentOne, $dailyPercentPOne, $dailyIncome, $statusRunning);	
        mysqli_query($conn, $sql_running1);

        $sql_running2 = sprintf('INSERT INTO runninginvestment (user, investment, plan, period, days, percent, dailypercent, dailyincome, status) VALUES ("%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s")', 
        $user_id, $investment, $plan, $periodTwo, $days, $percentTwo, $dailyPercentPTwo, $dailyIncome, $statusPending);	
        mysqli_query($conn, $sql_running2);

        $sql_running3 = sprintf('INSERT INTO runninginvestment (user, investment, plan, period, days, percent, dailypercent, dailyincome, status) VALUES ("%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s")', 
        $user_id, $investment, $plan, $periodThree, $days, $percentThree, $dailyPercentPThree, $dailyIncome, $statusPending);	
        mysqli_query($conn, $sql_running3);

        $sql_running4 = sprintf('INSERT INTO runninginvestment (user, investment, plan, period, days, percent, dailypercent, dailyincome, status) VALUES ("%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s")', 
        $user_id, $investment, $plan, $periodFour, $days, $percentFour, $dailyPercentPFour, $dailyIncome, $statusPending);	
        mysqli_query($conn, $sql_running4);
        

        $_SESSION["alert_type"] = "success";
        $_SESSION["alert_msg"] = "Plan Purchase Successfully";
       
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
        <title>Dashboard - Income Members</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

        <link href="./css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            
            .flex-between{
            display: flex; 
            flex-direction: row;
            justify-content: space-between;
            }

            .nopd{
                padding: 0; 
            }

            .nomg{
                margin: 0;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
		<?php include("topnav.php"); ?>
		<div id="layoutSidenav">
            <?php include("sidebar.php"); ?>
			<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <?php include("include/alertbox.php"); ?>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"><h3>$<?php echo number_format($user_balance, 2); ?></h3></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <b>Account Balance</b>
                                    </div>
                                </div>
                            </div>

							<div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"><h3><?php echo $user_active_investment_count; ?></h3></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <b>No. of Active Investment</b>
                                    </div>
                                </div>
                            </div>
    
							<div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"> <h3>$<?php echo number_format($user_active_investment_amount, 2)?></h3></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                       <b>Total Active Investment</b>
                                    </div>
                                </div>
                            </div>
                                                      
							<div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body"><h3>$<?php echo number_format($user_active_withdrawal_amount, 2)?></h3></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <b>Total Withdrawal</b>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="row">
                             <?php 
                                $activeInvestmet = getAllUserInvestment($user_id, $statusRunning);
                                $i = 1;
                                while($row = mysqli_fetch_assoc($activeInvestmet)){
                            ?>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-12">
                                <div class="card mb-4 rounded-3 shadow-sm border-primary">
                                    <div class="flex-between card-header py-3 text-white bg-primary border-primary">
                                        <div>
                                            <h4 class="my-0 fw-normal"><b><?php echo getPlansName($row["plan"]); ?></b></h4>
                                            <p>Plan</p>
                                        </div>
                                        <div>
                                            <h4 class="my-0 fw-normal"><b><?php echo $row["status"]; ?></b></h4>
                                            <p>Status</p>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="flex-between">
                                            <div>
                                                <h2 class="nopd nomg"><strong>$<?php echo number_format($row["amount"],2) ?></strong></h2>
                                                <p class="nopd nomg">Investment Amount</p>      
                                            </div>
                                            <div>
                                                <h3 class="nopd nomg"><strong>$<?php echo "1000" ?></strong></h3>
                                                <p class="nopd nomg">Total Return</p>      
                                            </div>
                                        </div>
                                        <div class="d-flex" style="justify-content:flex-end;">
                                            <button  class="btn btn-small btn-info" id="cycle">Investment Cycle</button>
                                        </div>
                                        <div class="running-period border" id="running-period" style="display:none;">
                                            <h1>love</h1>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="flex-between text-default">
                                            <div>
                                                <p>Start Date: <strong><?php echo $row["date"]; ?></strong></p>
                                            </div>
                                            <div>
                                                <p>End Date: <strong><?php echo $row["stop"]; ?></strong></p>
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                      

                        <div class="row">
                             <?php 
                                $activePlans = getplans();
                                $i = 1;
                                while($row = mysqli_fetch_assoc($activePlans)){
                            ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mb-4 rounded-3 shadow-sm border-primary">
                                    <div class="card-header py-3 text-white bg-primary border-primary">
                                        <h4 class="my-0 fw-normal"><b><?php echo $row["name"]; ?></b></h4>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title pricing-card-title"><?php echo $row["total"]; ?>%<small class="text-muted fw-light">/<?php echo $row["period"]; ?>month</small></h1>
                                        <ul class="list-unstyled mt-3 mb-4">
                                            <li>Minimum Deposit $<?php echo number_format($row["min"],2); ?></li>
                                            <li>Maximum Deposit $<?php echo number_format($row["max"],2); ?></li>
                                            <hr>
                                            <li>Month 1 Returns: <b><?php echo $row["period1percent"]; ?>%</b></li>
                                            <li>Month 2 Returns: <b><?php echo $row["period2percent"]; ?>%</b></li>
                                            <li>Month 3 Returns: <b><?php echo $row["period3percent"]; ?>%</b></li>
                                            <li>Month 4 Returns: <b><?php echo $row["period4percent"]; ?>%</b></li>
                                        </ul>
                                      
                                        
                                        <form method="post" action="">

                                            <div id="invstamtview" style="display:none;" class="form-group">
                                                <input type="hidden" name="plan" value="<?php echo $row['id']; ?>" id="">
                                                <input type="hidden" name="period" value="<?php echo $row['period']; ?>" id="">
                                                <input type="number" placeholder="Enter Investment Amount" value="<?php echo $row["min"]; ?>" name="amount" step="50" min="<?php echo $row["min"]; ?>" max="<?php echo $row["max"]; ?>" id="invsmtamount" class="form-control">
                                                <br />
                                            </div>
                                            <button type="button" id="selectplan" class="w-100 btn btn-lg btn-primary">Select Plan</button>
                                            <button style="display:none;" type="submit" id="buyplan" name="buyplan" class="w-100 btn btn-lg btn-primary">Buy Plan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        
                    </div>
                </main>
                <?php include("footer.php"); ?>
            </div>
        </div>
        <script>
            const selectPlan = document.getElementById("selectplan");
            const buyplan = document.getElementById("buyplan");
            const invstAmtView = document.getElementById("invstamtview");
            const invsmtamount = document.getElementById("invsmtamount");
            selectPlan.addEventListener("click", ()=>{

                invstAmtView.style.display = "block";
                
                selectPlan.style.display = "none";
                buyplan.style.display = "block";
            })


            const cycle = document.getElementById("cycle");
            const runningPeriod = document.getElementById("running-period");

            cycle.addEventListener("click", ()=>{
                runningPeriod.style.display = "block";
            })
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
