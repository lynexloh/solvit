  <?php 
  $rewards ="active";
  $tag = "Reward";
  
  
  include("head.php");
  
  
					$query = "SELECT * FROM product";

                     $data = $MySQLi_CON->query($query);

                     foreach ($data as $datas ) {
						
						$expert = $datas['expert_ID'];
						$user = $datas['user_ID'];
					 }
  
  
  
  
  
  ?>
  <!-- Left side column. contains the logo and sidebar -->

  <link rel="stylesheet" href="css/styles.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins

  <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
              <!-- Content Header (Page header) -->
              <section class="content-header">
                <h1>
                  Reward
                </h1>
                <ol class="breadcrumb">
                  <li><a href="admin_panel"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li class="active">Create Reward</li>
                </ol>
              </section>

              <!-- Main content -->
              <section class="content">
                <!-- Main row (Stat box) -->
                <div class="row">
                  <div class="create-user-box">
                  
                    <div class="create-users-box-body">
                      <p class="login-box-msg">Create Reward</p>

                      <form action="rezero.php" name="registrationform" method="post">
                 
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" name="name" placeholder="Reward name"required>
                          <span class="fa fa-gift form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" name="point" placeholder="Point" required>
                          <span class="fa fa-money form-control-feedback"></span>
                        </div>
						  <div class="form-group has-feedback">
                          <input type="text" class="form-control" name="status" placeholder="Status" required>
                          <span class="glyphicon glyphicon-check form-control-feedback"></span>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4 pull-right movebtn">
                          <input type="submit" name="submit" value="create" class="btn btn-primary btn-block btn-flat"></input>
                        </div>
                        <!-- /.col -->
                      </div>
                    </form>
                    <!-- /.form-box -->
                  </div>
                  <!-- /.register-box -->
                  <!-- ./col -->
                </div>
                <!-- main /.row -->
              </section>
              <!-- /.content -->
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
