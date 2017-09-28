
<?php 


  $tag = "Forum Questions";



include("head.php");
  
  
  
  ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Question
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
			  
			  
			 <a href="post.php">
			 
			 
			 <?php
		if($type=="User"){
			
		
		
		?>
			<button type="button"  class="btn btn-danger btn-lg btn3d"><span class="glyphicon glyphicon-question-sign"></span> Post A Problem</button>
	
	
		<?php
		}
		else{
		
		}
		?>
			 
			 
			 
	
	
	
	</a>
</br></br>
     <table class="table table-striped">
        <thead>
          </thead>
		 		
          <tbody>
		  <?php 
					$var_value = $_GET['varname'];
					$type = $_GET['type'];
						//Fetch all the data from the package.
                     $query = "SELECT * FROM post WHERE problem = '$var_value' and type = '$type'";

                     $data = $MySQLi_CON->query($query);

                     foreach ($data as $key ) {

                   ?>
          <tr class="active">
		
            <td><div class = "col-sm-6 col-md-2">
      <a  class = "thumbnail">
         <img src = "<?php echo $key['image'];?>" alt = "No image was uploaded">
      </a>
   </div><strong><?php echo $key['title'];?></strong><br/>Product Type: <?php echo $key['type'];?></a><br/>Brand / Model: <?php echo $key['modal'];?><br/>Problem: <?php echo $key['problem'];?><br/>Method: <?php echo $key['method'];?><br/> Description: <?php echo $key['description'];?> </td>
			
   
            <td><strong>Date</strong><br/><?php echo $key['date'];?><br/><?php $ID = $key['user_ID'];
			$query = "SELECT * FROM user where user_ID = $ID";
                     $data = $MySQLi_CON->query($query);
			 foreach ($data as $key1 ) {
				 echo $key1['user_Name'];			 
			 }
			 
			 
			?><br/>
          	  <a class="btn btn-hot btn-block" href="answer.php?post=<?php echo $key['post_ID'] ?>"><i class="fa fa-hand-o-right"></i>Answer This</a></td>
		  </tr>
				<?php
                  }
                  ?>		  

      
          <!--washington-->
        </tbody>
      </table>
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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
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
