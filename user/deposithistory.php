<?php 
require("./include/config.php");
require("./include/function.php"); 
require("./include/session.php");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Deposit History - Income Members</title>
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
                        <h1 class="mt-4">Deposit History</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Deposit History</li>
                        </ol>
						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Deposit History
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Payment Type</th>
                                            <th>Amount</th>
                                            <th>Receipt</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>Payment Type</th>
                                            <th>Amount</th>
                                            <th>Receipt</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $deposit_history =  getMyDeposit($user_id);
                                            $i = 1;
                                            while($row = mysqli_fetch_assoc($deposit_history)){
                                        ?>
                                        <tr>
                                            <td><?php echo $i; $i++ ?></td>
                                            <td><?php echo $row["type"]; ?></td>
                                            <td>$<?php echo $row["amount"]; ?></td>
                                            <td><?php echo $row["receipt"]; ?></td>
                                            <td><?php echo $row["status"]; ?></td>
                                            <td><?php echo $row["date"]; ?></td>
                                            
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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
