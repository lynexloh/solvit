  <!-- Main Header -->
  <?php 
  
  
 $solvit ="active";
 $solve= "active";
  $tag = "Forum";
  
  include("head.php");
  
  $hardware = "Hardware";
  $software = "Software";
    $computer = "Computer";
  $mobile = "Mobile";
			
			
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Forum
      </h1>
      <ol class="breadcrumb">
        <li><a href="member_panel"><i class="fa fa-dashboard"></i> Home</a></li>
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
     
			  <section class="content">
      <!-- Main row (Stat box) -->
      
  <p class="lead">This is the right place to discuss any ideas, critics, feature requests and all the ideas regarding IT problems. Please follow the forum rules and always check FAQ before posting to prevent duplicate posts.</p>
  
  <table class="table forum table-striped">
    <thead>
      <tr>
        <th class="cell-stat"></th>
        <th>
			<img src="dist/img/lapt.jpg" class="img-thumbnail" width="320" height="236" alt="User Image">
          <!--<h3>Computers and Laptops</h3>-->
        </th>
        <th class="cell-stat text-center hidden-xs hidden-sm">Topics</th>
        <th class="cell-stat text-center hidden-xs hidden-sm">Posts</th>
        <th class="cell-stat-2x hidden-xs hidden-sm">Last Post</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="text-center"><i class="fa fa-question fa-2x text-primary"></i></td>
        <td class="name">
		
          <h4><a href="solve.php?varname=<?php $var_value = "Hardware"; echo $var_value ?>&type=<?php $type = "Computer"; echo $type ?>">Hardware</a><br><small>Some description</small></h4>
        </td>
        <td class="text-center hidden-xs hidden-sm"><a href="#"></a></td>
        <td class="text-center hidden-xs hidden-sm"><a href="#"></a></td>
        <td class="hidden-xs hidden-sm">by <a href="#"><?php $query = "SELECT date,user_ID FROM post WHERE problem like '$hardware' and type like '$computer'";
                     $data = $MySQLi_CON->query($query);
					 $items = array();
						foreach($data as $key) {
						 $items[] = $key['date'];
						}		
						$date1 = max($items); 
					
						$userQuery = "select user_ID from post where date like '$date1'";
								$userData = $MySQLi_CON->query($userQuery);
								foreach($userData as $userKey) {
								$userD = $userKey['user_ID'];
								}	
								
								
								
								$usersQuery= "select user_Name from user where user_ID = $userD";
								$usersData = $MySQLi_CON->query($usersQuery);
								foreach($usersData as $usersKey) {
								$user1 = $usersKey['user_Name'];
								}	
							echo $user1;
						
						?>
		
		
		
		
		
		
		</a><br><small><i class="fa fa-clock-o"></i> <?php $query = "SELECT date,user_ID FROM post WHERE problem like '$hardware' and type like '$computer'";
                     $data = $MySQLi_CON->query($query);
					 $items = array();
						foreach($data as $key) {
						 $items[] = $key['date'];
						}		
						$date1 = max($items); echo $date1 ?></small></td>
      </tr>
      <tr>
        <td class="text-center"><i class="fa fa-exclamation fa-2x text-danger"></i></td>
        <td class="name">
		 <h4><a href="solve.php?varname=<?php $var_value = "Software"; echo $var_value ?>&type=<?php $type = "Computer"; echo $type ?>">Software</a><br><small>Some description</small></h4>

        </td>
        <td class="text-center hidden-xs hidden-sm"><a href="#"></a></td>
        <td class="text-center hidden-xs hidden-sm"><a href="#"></a></td>
        <td class="hidden-xs hidden-sm">by <a href="#"><?php $query = "SELECT date,user_ID FROM post WHERE problem like '$software' and type like '$computer'";
                     $data = $MySQLi_CON->query($query);
					 $items = array();
						foreach($data as $key) {
						 $items[] = $key['date'];
						}		
						$date1 = max($items); 
					
						$userQuery = "select user_ID from post where date like '$date1'";
								$userData = $MySQLi_CON->query($userQuery);
								foreach($userData as $userKey) {
								$userD = $userKey['user_ID'];
								}	
								
								
								
								$usersQuery= "select user_Name from user where user_ID = $userD";
								$usersData = $MySQLi_CON->query($usersQuery);
								foreach($usersData as $usersKey) {
								$user1 = $usersKey['user_Name'];
								}	
							echo $user1;
						
						?></a><br><small><i class="fa fa-clock-o"></i> <?php 	$query1 = "SELECT date,user_ID FROM post WHERE problem like '$software' and type like '$computer'";
                     $data1 = $MySQLi_CON->query($query1);
					 $items1 = array();
						foreach($data1 as $key1) {
						 $items1[] = $key1['date'];
						}		
						$date2	 = max($items1); echo $date2 ?></small></td>
      </tr>
    </tbody>
  </table>
  <table class="table forum table-striped">
    <thead>
      <tr>
        <th class="cell-stat"></th>
        <th>
		<img src="dist/img/smart.jpg" class="img-thumbnail" width="320" height="236" alt="User Image">
         <!-- <h3>Handheld Devices</h3>-->
        </th>
        <th class="cell-stat text-center hidden-xs hidden-sm">Topics</th>
        <th class="cell-stat text-center hidden-xs hidden-sm">Posts</th>
        <th class="cell-stat-2x hidden-xs hidden-sm">Last Post</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="text-center"><i class="fa fa-question fa-2x text-primary"></i></td>
        <td>
		  <h4><a href="solve.php?varname=<?php $var_value = "Hardware"; echo $var_value ?>&type=<?php $type = "Mobile"; echo $type ?>">Hardware</a><br><small>Some description</small></h4>
        </td>
        <td class="text-center hidden-xs hidden-sm"><a href="#"></a></td>
        <td class="text-center hidden-xs hidden-sm"><a href="#"></a></td>
        <td class="hidden-xs hidden-sm">by <a href="#"><?php $query = "SELECT date,user_ID FROM post WHERE problem like '$hardware' and type like '$mobile'";
                     $data = $MySQLi_CON->query($query);
					 $items = array();
						foreach($data as $key) {
						 $items[] = $key['date'];
						}		
						$date1 = max($items); 
					
						$userQuery = "select user_ID from post where date like '$date1'";
								$userData = $MySQLi_CON->query($userQuery);
								foreach($userData as $userKey) {
								$userD = $userKey['user_ID'];
								}	
								
								
								
								$usersQuery= "select user_Name from user where user_ID = $userD";
								$usersData = $MySQLi_CON->query($usersQuery);
								foreach($usersData as $usersKey) {
								$user1 = $usersKey['user_Name'];
								}	
							echo $user1;
						
						?></a><br><small><i class="fa fa-clock-o"></i> <?php 
							$query2 = "SELECT date,user_ID FROM post WHERE problem like '$hardware' and type like '$mobile'";
                     $data2 = $MySQLi_CON->query($query2);
					 $items2 = array();
						foreach($data2 as $key2) {
						 $items2[] = $key2['date'];
						}		
						$date3	 = max($items2); echo $date3 ?></small></td>
      </tr>
      <tr>
        <td class="text-center"><i class="fa fa-exclamation fa-2x text-danger"></i></td>
        <td>
           <h4><a href="solve.php?varname=<?php $var_value = "Software"; echo $var_value ?>&type=<?php $type = "Mobile"; echo $type ?>">Software</a><br><small>Some description</small></h4>
        </td>
        <td class="text-center hidden-xs hidden-sm"><a href="#"></a></td>
        <td class="text-center hidden-xs hidden-sm"><a href="#"></a></td>
        <td class="hidden-xs hidden-sm">by <a href="#"><?php $query = "SELECT date,user_ID FROM post WHERE problem like '$software' and type like '$mobile'";
                     $data = $MySQLi_CON->query($query);
					 $items = array();
						foreach($data as $key) {
						 $items[] = $key['date'];
						}		
						$date1 = max($items); 
					
						$userQuery = "select user_ID from post where date like '$date1'";
								$userData = $MySQLi_CON->query($userQuery);
								foreach($userData as $userKey) {
								$userD = $userKey['user_ID'];
								}	
								
								
								
								$usersQuery= "select user_Name from user where user_ID = $userD";
								$usersData = $MySQLi_CON->query($usersQuery);
								foreach($usersData as $usersKey) {
								$user1 = $usersKey['user_Name'];
								}	
							echo $user1;
						
						?></a><br><small><i class="fa fa-clock-o"></i> <?php 
						$query3 = "SELECT date,user_ID FROM post WHERE problem like '$software' and type  like '$mobile'";
                     $data3 = $MySQLi_CON->query($query3);
					 $items3 = array();
						foreach($data3 as $key3) {
						 $items3[] = $key3['date'];
						}		
						$date4	 = max($items3); echo $date4 ?></small></td>
      </tr>
    </tbody>
  </table>

  </br></br></br>  
      <!-- /main .row -->
    </section>
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
<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
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
<script type="text/javascript" src="scripts/style.js"></script>
	<script type="text/javascript" src="scripts/custom.js"></script>
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
