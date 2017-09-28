 <?php 
  
  $reward ="active";
  $tag = "Reward";
  
  
  include("head.php");
  $id = $_SESSION['userSession'];
  
  
  ?>
    <!-- Font Awesome -->

  <link rel="stylesheet" href="css/styles.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins

  <!-- Left side column. contains the logo and sidebar -->


  <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	
      <h1>
        Purchase Item
      </h1>
      <ol class="breadcrumb">
        <li><a href="member_panel.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Purchase Item History</li>
      </ol>
      <br>
      <div class="col-xs-4 col-md-3 card pull-right">
        <section class="background_card" style="background-color: #7ab885;">
          <header>
            <ul>
              <li class="c_balance">
                Current Balance
              </li>

            </ul>
            <ul class="pull-right">
            <?php
            // to include the file containing the link to the database.
           
            $stmt0 = "SELECT points FROM user WHERE user_ID LIKE $id";

            $data = $MySQLi_CON->query($stmt0);

                  foreach ($data as $key ) {

                      $balance = $key['points'];
                  }
            ?>
            
                <h4> <?php echo $balance; ?> </h4>
            </ul>
          </header>
          <article>
            <ul class="sections">
            </ul>
          </article>
          <footer>
            <ul class="sections">
            </ul>
          </footer>
        </section>
      </div>
    </section>

    <br><br><br><br><br><br><br>
    <!-- Main content -->
    <section class="content">
      <!-- Main row (Stat box) -->
      <div class="row">
	  
        <div class="col-xs-12 col-md-10 col-md-offset-1">
		
          <div class="box">
		  
            <div class="box-header">
              <h3 class="box-title">Product	</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<form action="reward2.php" method="get">
              <table id="exchange_item_table" class="table table-bordered table-stripedorder-column" cellspacing="0" width="100%">
                <br>
                <thead>
                <tr>
					<th id="items">Date</th>

                  <th id="items">Rewards</th>
                  <th id="price">Points</th>

                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
                  //Fetch all the data from the package.
                  $query = "SELECT * FROM reward";
                  $data = $MySQLi_CON->query($query);
                  foreach ($data as $key ) {			  
                ?>
                <tr>
				<td><h3><?php echo $key['date'];?></h3>
				  </td>
                  <td class="pname"><h3><?php echo $key['name'];?></h3>
				  </td>
				   <td class="price"><h3><?php echo $key['points'];?></h3>
				  </td>
				<input id ="id" name = "id" type = "hidden" value="<?php echo $key['reward_ID']; ?>">
				<td></br><input class='btn btn-info btn-xs' name="submit" type="submit" value="Claim">
</td>
	
                </tr>
                <?php
                  }
                  ?>
				         
                </tbody>
                <tfoot>
                </tfoot>
              </table>
			  </form>
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
<script>
  $(function () {

    $('#exchange_item_table').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "scrollX": true
    });
  });


</script>
</body>
</html>
