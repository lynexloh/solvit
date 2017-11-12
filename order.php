<?php 
	$order ="active";
	$tag = "Offers";
	include("head.php");
	$loggedInUserId = $_SESSION['userId'];
	$loggedInUserType = $_SESSION['userType'];
	if ($loggedInUserType == "User"){
		$offerQuery = "SELECT * FROM offers WHERE clientId LIKE $loggedInUserId AND offerStatus NOT LIKE 'Declined' AND repairStatus NOT LIKE 'Completed'";
	}
	else{
		$offerQuery = "SELECT * FROM offers WHERE technicianId LIKE $loggedInUserId AND repairStatus NOT LIKE 'Completed'";
	}
?>
  <!-- Left side column. contains the logo and sidebar -->
 <style type="text/css">
        .center {
    margin-top:50px;   
}

.modal-header {
	padding-bottom: 5px;
}

.modal-footer {
    	padding: 0;
	}
    
.modal-footer .btn-group button {
	height:40px;
	border-top-left-radius : 0;
	border-top-right-radius : 0;
	border: none;
	border-right: 1px solid #ddd;
}
	
.modal-footer .btn-group:last-child > button {
	border-right: 0;
}
    </style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Offers
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Offers Viewer</li>
      </ol>
    </section>

    <!-- Main content -->
      <section class="content">
      <!-- Main row (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
			<div class="box-body">
				<ul class="nav nav-pills">
					<li class="active"><a data-toggle="pill" href="#thistory">Status</a></li>
					<li><a data-toggle="pill" href="#tacc">History</a></li>
				</ul>
				<div class="tab-content">
					<?php
						if ($loggedInUserType == 'Technician'){
					?>
					<!-- Technician Offer -->
					<div id="thistory" class="tab-pane fade in active">
						<table id="token_table" class="table table-bordered table-striped display" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th> Date </th>
									<th> Post Title </th>
									<th> Client Name </th>
									<th> Price Offered (RM) </th>
									<th> Offer Status </th>
									<th> Repair Status </th>
									<th> Payment Status </th>
									<th> Action </th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$offersList = $MySQLi_CON->query($offerQuery);
								foreach ($offersList as $key) {
									if ($key['offerStatus'] == "Accepted"){
										$rowColor = '#A2FFA7';
									}
									else if ($key['offerStatus'] == "Declined"){
										$rowColor = '#FFA2A2';
									}
									else{
										$rowColor = '#FFE3A2';
									}
							?>
								<tr style="background:<?php echo $rowColor ?>">
									<td><?php echo $key['dateOffered'];?></td> 
									<td><a href="answer.php?post=<?php echo $key['postId'] ?>"><?php echo $key['postTitle'];?></a></td>
									<td><a href="expert.php?ids=<?php echo $key['clientId'] ?>"><?php echo $key['clientName'];?></a></td>
									<td>
										<?php echo $key['priceOffered'];?> 
										<!--<button data-toggle="modal" data-target="#squarespaceModal" style="float:right" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-piggy-bank"></span> Change</button> -->
									</td> 
									<td><?php echo $key['offerStatus'];?></td> 
									<td><?php echo $key['repairStatus'];?></td> 
									<td><?php echo $key['paymentStatus'];?></td> 
									<td class="text-center">
										<form method="post" action="cancel.php">
											<input name = "offerId" type = "hidden" value="<?php echo $key['offerId']; ?>">
											<?php
												if ($key['offerStatus'] == 'Accepted' && $key['paymentStatus'] == 'Paid'){
											?>
											<button name="complete" class="btn btn-primary btn-xs" onclick="return confirm('Confirmed repair completed?');"><span class="glyphicon glyphicon-ok"></span> Complete</button>
											<?php
												}
												else if ($key['offerStatus'] == 'Accepted' && $key['paymentStatus'] == 'Not Paid'){
											?>
											<button name="complete" class="btn btn-primary btn-xs" onclick="return confirm('Confirmed repair completed?');" disabled><span class="glyphicon glyphicon-ok"></span> Complete</button>
											<?php
												}
												else{
											?>
											<button name="cancel" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this offer?');"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
											<?php
												}
											?>
										</form>
									</td>
								</tr>
							<?php
								}
							?>
							</tbody>
						</table>
					</div>
					<!--Technician offer History-->
					<div id="tacc" class="tab-pane fade">
						<table id="token_table2" class="table table-bordered table-striped display" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th> Date offered </th>
									<th> Date Completed </th>
									<th> Post Title </th>
									<th> Client Name </th>
									<th> Price Offered (RM) </th>
								</tr>
							</thead>
							<tbody>
								<?php
									$historyQuery = "SELECT * FROM offers WHERE technicianId LIKE $loggedInUserId AND offerStatus = 'Accepted' AND repairStatus = 'Completed'";
									$historyList = $MySQLi_CON->query($historyQuery);
									foreach ($historyList as $historyRow) {  
								?>
								<tr>
									<td><?php echo $historyRow['dateOffered'];?></td> 
									<td><?php echo $historyRow['dateCompleted'];?></td> 
									<td><a href="answer.php?post=<?php echo $historyRow['postId'] ?>"><?php echo $historyRow['postTitle'];?></a></td>
									<td><a href="expert.php?ids=<?php echo $historyRow['clientId'] ?>"><?php echo $historyRow['clientName'];?></a></td>
									<td><?php echo $historyRow['priceOffered'];?></td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
					<?php
						}
						//General User Offers
						else{
					?>
					<div id="thistory" class="tab-pane fade in active">
						<table id="token_table" class="table table-bordered table-striped display" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th> Date </th>
									<th> Post Title </th>
									<th> Tecnician Name </th>
									<th> Price Offered (RM) </th>
									<th> Offer Status </th>
									<th> Repair Status </th>
									<th> Payment Status </th>
									<th> Action </th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$offersList = $MySQLi_CON->query($offerQuery);
									foreach ($offersList as $key) {
								?>
								<tr>
									<td><?php echo $key['dateOffered'];?></td> 
									<td><a href="answer.php?post=<?php echo $key['postId'] ?>"><?php echo $key['postTitle'];?></a></td>
									<td>
										<a href="expert.php?ids=<?php echo $key['technicianId'] ?>">
										<?php 
											$techId = $key['technicianId'];
											$findTechnician = "SELECT * FROM users WHERE userId LIKE $techId";
											$techResult = $MySQLi_CON->query($findTechnician);
											foreach ($techResult as $row) {
												echo $row['userName'];
											}
										?>
										</a>
									</td>
									<td><?php echo $key['priceOffered'];?></td> 
									<td><?php echo $key['offerStatus'];?></td> 
									<td><?php echo $key['repairStatus'];?></td>
									<td><?php echo $key['paymentStatus'];?></td> 
									<td class="text-center">
										<form method="post" action="cancel.php">
											<input name = "offerId" type = "hidden" value="<?php echo $key['offerId']; ?>">
											<input name = "postId" type = "hidden" value="<?php echo $key['postId']; ?>">
											<input name = "technicianId" type = "hidden" value="<?php echo $key['technicianId']; ?>">
											<?php
												if ($key['offerStatus'] == 'Accepted' && $key['paymentStatus'] == 'Not Paid'){
											?>
											<a class='btn btn-info btn-xs' href="paypal.php?id=<?php echo $key['offerId'] ?>"><span class="glyphicon glyphicon-piggy-bank"></span> Pay</a>
											<?php
												}
												else if ($key['offerStatus'] == 'Accepted' && $key['paymentStatus'] == 'Paid'){
											?>
											<b>Please wait for completion</b>
											<?php
												}
												else{
											?>
											<button name="accept" class='btn btn-info btn-xs' onclick="return confirm('Confirm to accept this offer?');"><span class="glyphicon glyphicon-plus"></span> Accept</button>
											<button name="decline" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to decline this offer?');"><span class="glyphicon glyphicon-remove"></span> Decline</button>
											<?php
												}
											?>
										</form>
									</td>									
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
					<!-- User History -->
					<div id="tacc" class="tab-pane fade">
						<table id="token_table2" class="table table-bordered table-striped display" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th> Date offered </th>
									<th> Date Completed </th>
									<th> Post Title </th>
									<th> Technician Name </th>
									<th> Price Offered (RM) </th>
								</tr>
							</thead>
							<tbody>
								<?php
									$historyQuery = "SELECT * FROM offers WHERE clientId LIKE $loggedInUserId AND offerStatus LIKE 'Accepted' AND repairStatus LIKE 'Completed'";
									$historyList = $MySQLi_CON->query($historyQuery);
									foreach ($historyList as $historyRow ) {  
								?>
								<tr>
									<td><?php echo $historyRow['dateOffered'];?></td>
									<td><?php echo $historyRow['dateCompleted'];?></td> 
									<td><a href="answer.php?post=<?php echo $historyRow['postId'] ?>"><?php echo $historyRow['postTitle'];?></a></td>
									<td>
										<a href="expert.php?ids=<?php echo $historyRow['technicianId'] ?>">
										<?php 
											$techId = $historyRow['technicianId'];
											$findTechnician = "SELECT * FROM users WHERE userId LIKE $techId";
											$techResult = $MySQLi_CON->query($findTechnician);
											foreach ($techResult as $row) {
												echo $row['userName'];
											}
										?>
										</a>
									</td>
									<td><?php echo $historyRow['priceOffered'];?></td> 
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
					<?php
						}
					?>		  
					
					
				</div>
			</div>
            <!-- /.box-body -->
          </div>
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /main .row -->
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

  <!-- the div that represents the modal dialog -->

	<form method="post" action="payAmt.php">
		<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						<h3 class="modal-title" id="lineModalLabel">Order Amount</h3>
					</div>
					<div class="modal-body">
						<!-- content goes here -->
						<div class="form-group">
							<label for="exampleInputEmail1">Current Price Offered</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="<?php echo $key['priceOffered'];?>" disabled />
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">New Price</label>
							<input type="text" name ="price" class="form-control" id="exampleInputEmail1" placeholder="Enter new price" required />
						</div>
						<input name = "offerId" type = "hidden" value="<?php echo $key['offerId']; ?>">
					</div>
					<div class="modal-footer">
						<div class="btn-group btn-group-justified" role="group" aria-label="group button">
							<div class="btn-group" role="group">
								<button  type="submit" name="submit" class="btn btn-default btn-hover-green"> Save</button>
							</div>
							<div class="btn-group" role="group">
								<button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
							</div>
							<div class="btn-group btn-delete hidden" role="group">
								<button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
  
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
  <script src="plugins/jQuery/jquery-3.1.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<!-- REQUIRED JS SCRIPTS -->

<!-- AdminLTE App -->

	<script type="text/javascript" src="scripts/custom.js"></script>

<script src="js/myprofile.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<script src="js/myprofile.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="js/bootstrap/bootstrap.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- SBC App -->
<script language="javascript">
	populateCountries("country2");
</script>

<script src="dist/js/app.min.js"></script>
<script src="css/htmlfromrss.js"></script>

		<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script>
  $(document).ready(function() {
      $('#token_table').DataTable( {
          "scrollX": true,
          dom: 'Bfrtip',
          buttons: [
              'csv', 'excel', 'pdf', 'print'
          ]
      } );


      $('#token_table2').DataTable( {
          
          dom: 'Bfrtip',
          buttons: [
              'csv', 'excel', 'pdf', 'print'
          ]
      } );
  } );
</script>
<script>
$(function() {
  $('#reportselector').change(function(){
    $('#' + $(this).val()).show();
  });
});
</script>
</body>
</html>