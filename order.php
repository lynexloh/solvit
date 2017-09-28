<?php 
  
  $order ="active";
  $tag = "Order";
  
  
  include("head.php");
  
  
					$query = "SELECT * FROM product";

                     $data = $MySQLi_CON->query($query);

                     foreach ($data as $datas ) {
						
						$expert = $datas['expert_ID'];
						$user = $datas['user_ID'];
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
        Order
      </h1>
      <ol class="breadcrumb">
        <li><a href="starter.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Order Viewer</li>
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
              <div id="thistory" class="tab-pane fade in active">
			  
			  
		<?php
if ($id==$expert && $type == 'Technician'){

		?>
  <table id="token_table" class="table table-bordered table-striped display" cellspacing="0" width="100%">
                <br>
                <thead>
                <tr>
		  <th> Date </th>
		   <th> Type </th>
		   <th> Name </th>
		   
		    <th> Problem </th>
	
		  <th>	Client </th>
		   <th>	Method </th>
		 
		   <th>	Payment </th>
  <th>	Status </th>

		</tr>
		<tbody>
		
		          <?php 
                     //Fetch all the data from the package.
                     $query = "SELECT * FROM product where expert_ID like $id";

                     $data = $MySQLi_CON->query($query);

                     foreach ($data as $key ) {

                   ?>
                <tr>
				  <td><?php echo $key['date'];?></td> 
                  <td><?php echo $key['type'];?></td>
				    <td><?php echo $key['name'];?></td>
                
				   <td><?php echo $key['problem'];?></td> 
				   		<td><?php 
						$userID = $key['user_ID'];
						$query1 = "SELECT * FROM user where user_ID like $userID";
						
						 $userData = $MySQLi_CON->query($query1);

                     foreach ($userData as $userKey ) {
						 echo $userKey['user_Name'];	 
					 }
						
						?>
						
						
						
						</td>

		
				<td><?php echo $key['method'];?></td>
					
					
					<?php if ($key['payment'] == 0){
						
					
					
					?>
					

					 <td class="text-center"><button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-piggy-bank"></span> Set Amount</button></td>
					 
					
					 <?php
						 }
						 else{
							  ?>
							 
							  <td><?php echo $key['payment'];?>  </td>
							  <?php
						 }
				 ?>
					
                 
				  
				  
				  
			<td><?php echo $key['status'];?></td>	
                </tr>
                <?php
                  }
                  ?>
           
	      
		</tbody>
                <tfoot>
                </tfoot>
              </table>
			  <?php
}


else{
	?>
	  <table id="token_table" class="table table-bordered table-striped display" cellspacing="0" width="100%">
                <br>
                <thead>
                <tr>
		  <th> Date </th>
		   <th> Type </th>
		   <th> Name </th>
		   
		    <th> Problem </th>
			  <th>	Technician </th>

		  <th>	Support </th>
		 
		   <th>	Payment </th>
  <th>	Status </th>
<th>	Action </th>
	
		</tr>
		<tbody>
		
		          <?php 
                     //Fetch all the data from the package.
                     $query = "SELECT * FROM product where user_ID like $id";

                     $data = $MySQLi_CON->query($query);

                     foreach ($data as $key ) {

                   ?>
                <tr>
				  <td><?php echo $key['date'];?></td> 
                  <td><?php echo $key['type'];?></td>
				    <td><?php echo $key['name'];?></td>
                
				   <td><?php echo $key['problem'];?></td> 
				   		<td>		
						<?php $expertise = $key['expert_ID'];
						
						 $quer = "SELECT * FROM user where user_ID like $expertise";

                     $da = $MySQLi_CON->query($quer);

                     foreach ($da as $ke ) {
							echo $ke['user_Name'];
							 }
						?>
						</td>

		
				<td><?php echo $key['method'];?></td>
					
                  <td><?php echo $key['payment'];?>
				  
				  
				  </td>
			<td><?php echo $key['status'];?></td>	
				<form method="post" action="cancel.php">  
	 <?php $orderID = $key['order_ID']; 
				  ?>  
		                 <td class="text-center">
						 
						 <?php 
						 if($key['payment'] != 0 &&  $key['confirm'] == 'Yes' && $key['status'] != 'Paid' )
						 {
						 ?>	
						 <a class='btn btn-info btn-xs' href="paypal.php?id=<?php echo $orderID ?>"><span class="glyphicon glyphicon-piggy-bank"></span> Pay</a> 
						 
						<?php
						  }
						 else if($key['payment'] == 0 && $key['confirm'] == 'No' && $key['status'] != 'Paid'){
							 ?>
							<a class='btn btn-info btn-xs' href="accept.php?id=<?php echo $orderID ?>"><span class="glyphicon glyphicon-plus"></span> Accept</a> 
							 <?php
							 
							 
							 
						 }	
						 else if($key['payment'] != 0 && $key['confirm'] == 'No' && $key['status'] != 'Paid'){
							 ?>			 
							 <a class='btn btn-info btn-xs' href="accept.php?id=<?php echo $orderID ?>"><span class="glyphicon glyphicon-piggy-bank"></span> Accept</a> 
							 <?php
						 }
						 else{
							 
							 
							 
						 }
						?>
						 <input name = "orderID" type = "hidden" value="<?php echo $orderID; ?>">
						<?php
						if($key['status'] != 'Paid' ){
						?>
						 <button name="accept" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
						 <?php
						}
						else{
							
						}
						 ?>
						 
						 
						 
						 </form>
						 
						 
					

					
                </tr>
                <?php
                  }
                  ?>
           
	      
		</tbody>
                <tfoot>
                </tfoot>
              </table>
	
	
	<?php

}
			  
	?>		  
			  
		  		  
            </div>
			<div id="tacc" class="tab-pane fade">
  <table id="token_table2" class="table table-bordered table-striped display" cellspacing="0" width="100%">
                <br>
                <thead>
               <tr>
		  
		   <th> Type </th>
		   <th> Name </th>
		   <th> Date </th>
		   
		   <th>	Expert </th>
		   <th>	Status </th>
		   <th>	Payment </th>
		   <th>	Action </th>
		</tr>
                </thead>
                <tbody>
                
                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
			
			
			
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
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
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
                <label for="exampleInputEmail1">Product Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="<?php echo $key['name'];?>" disabled />
              </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Product Problem</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="<?php echo $key['problem'];?>" disabled />
              </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Client Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="<?php echo $userKey['user_Name'];?>" disabled />
              </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="text" name ="price" class="form-control" id="exampleInputEmail1" placeholder="Enter the service amount" required />
              </div>
			   <input name = "orderID" type = "hidden" value="<?php echo $key['order_ID']; ?>">
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