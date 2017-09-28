
<?php
$tag = "Expert Information";

 include("head.php");
	$id = $_SESSION['userSession'];
	 if ($_SESSION['checkLogin'] != '1') {

          echo '<script language = "javascript">';
          echo 'alert("You have to login first.")';
          echo '</script>';
          echo  "<script> window.location.assign('index.php'); </script>";
          exit;
          }
	
	
	$ids = $_GET['ids'];
	$stmt3 = $MySQLi_CON->prepare("SELECT * from user WHERE user_ID LIKE $ids"); 
	$stmt3->execute(); 
	$result3 = $stmt3->fetchAll();
	foreach( $result3 as $row ) {
    	$name= $row["user_Name"];
		$email = $row["email"];
		$birthdate= $row["birthdate"];
		$occ= $row["occupation"];
		$mobile= $row["mobile"];
		$experience= $row["experience"];
		$date= $row["date"];
		$type= $row["type"];
		$status= $row["status"];
		$chat= $row["chat"];
			$point= $row["points"];
	}	
	$link = 'https://embed.tawk.to/';
	$pay = $chat;
	$last = '/default';
	$seasons = array($link, $pay, $last);
		$url = implode($seasons );
	
	//echo $url;
	
	//https://embed.tawk.to/57f5eca70188071f8b8d5856/default
	
 ?>
 <link rel="stylesheet" href="css/style1.css">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="member_panel"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">My Profile</li>
      </ol>
    </section>

    <!-- Main content -->
   <section class="content">
      <!-- Main row (Stat box) -->
      <div class="row">
        <div class="wrap">
          <div class="right-menu">
            <a  class="active" href="#profile" id="line-bottom"><i class="fa fa-user active-profile"></i><span id="active-profile">Profile</span></a>
            <a href="#project" id="line-bottom"><i class="ionicons ion-edit project-edit"></i><span id="project-edit">Info</span></a>
          </div>
          <div class="fade in active">
            <div class="content">
              <div class="profile open animated zoomIn" id="profile">
                <div class="avatar">
                  <img src="images/avatar5.png">
                  <div class="bubble">
                    <h3><?php echo $name?></h3>
                    <a href="#"></a>
                  </div>
                </div>
              </div>
              <div class="project animated zoomIn" id="project">
                <div class="avatar">
                  <div class="edit_content2">
                    <form action="#" method="post" id="edit-member-form">
                     <div class="form-group has-feedback">
                        <input type="text" class="form-control" name ="occupation" value='<?php echo $email; ?>' placeholder="Email">
                        <span class="fa fa-envelope form-control-feedback"></span>
                      </div>
					    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name ="occupation" value='<?php echo $mobile; ?>' placeholder="Mobile">
                        <span class="fa fa-phone form-control-feedback"></span>
                      </div>
					  <div class="form-group has-feedback">
                        <input type="text" class="form-control" name ="experience" value='<?php echo $experience; ?> years of experience' placeholder="Experience">
                        <span class="fa fa-home form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="number" value='<?php echo $occ; ?>' placeholder="Occupation">
                        <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
                      </div>
               
	            		
          
                     
                     </form>
                    </div>
                  </div>
                </div>
 
              </div>  <!--End Content-->
             </div>  <!--End of Fade in-->
           </div>  <!-- End of Wrap -->
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

<!-- REQUIRED JS SCRIPTS -->

<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

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

<script src="dist/js/app.min.js"></script>




<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
var web = '<?php echo $url; ?>';
s1.async=true;
s1.src= web;
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
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
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
