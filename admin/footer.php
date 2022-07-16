<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
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
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; <?php echo $sitename; ?> <?php echo $siteyear; ?></div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>