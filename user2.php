 <?php 
  $user2= "active";
  $tag = "User";
  
  
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
        User lists
      </h1>
      <ol class="breadcrumb">
        <li><a href="starter.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User Viewer</li>
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
       
			<div class="tab-content">
              <div id="thistory" class="tab-pane fade in active">
			  

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
