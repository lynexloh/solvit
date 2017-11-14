<?php
	$profile ="active";
	$tag = "User Profile";
	include("head.php");
	$id = $_SESSION['userId'];
	$stmt3 = $MySQLi_CON->prepare("SELECT * from users WHERE userId LIKE $id"); 
	$stmt3->execute(); 
	$result3 = $stmt3->fetchAll();
	foreach( $result3 as $row ) {
		$date= $row["dateCreated"];
		$type= $row["userType"];
		$status= $row["userStatus"];
		$name1 = $row["userName"];
		$email1 =  $row["email"];
		$pass1 = $row["password"];
		$dob1 = $row["dateOfBirth"];
		$mobile1 = $row["contactNumber"];
		$occ1 = $row["occupation"];
		$exp1 = $row["experience"];	
		$address1 = $row["address"];	
		$paypal1 = $row["paypalId"];	
	}
	if(isset($_POST['submit'])) {	
		$name = $_POST['name'];
		$dob = $_POST['dob'];
		//$email = $_POST['email'];
		$phone = $_POST['number'];
		$address = $_POST['address'];
		$expert = $_POST['occupation'];
		$exp = $_POST['experience'];
		//$pass = $_POST['password'];
		//$pass1 = $_POST['passord2'];
		//$hash = password_hash($pass, PASSWORD_DEFAULT);
		$sql = "UPDATE users SET userName=:name, dateOfBirth=:dob, contactNumber=:phone, occupation=:expert, experience=:exp, address=:address WHERE userId=:id";
		$stmt = $MySQLi_CON->prepare($sql);
		$stmt->bindValue(":name", $name, PDO::PARAM_STR);
		//$stmt->bindValue(":email", $email, PDO::PARAM_STR);
		$stmt->bindValue(":dob", $dob, PDO::PARAM_STR);
		$stmt->bindValue(":address", $address, PDO::PARAM_STR);
		$stmt->bindValue(":phone", $phone, PDO::PARAM_STR);
		$stmt->bindValue(":expert", $expert, PDO::PARAM_STR);
		$stmt->bindValue(":exp", $exp, PDO::PARAM_STR);
		//$stmt->bindValue(":hash", $hash, PDO::PARAM_STR);
		$stmt->bindValue(":id", $id, PDO::PARAM_STR);
		$stmt->execute();
		
		if($stmt){
		echo "<script language='javascript' type='text/javascript'>";
			echo "alert('Profile Updated Successfully');";
			echo "</script>";			
			$URL="profile.php";
			echo "<script>location.href='$URL'</script>";
		}
		else{
			echo "<script language='javascript' type='text/javascript'>";
			echo "alert('Profile Fail To Be Updated');";
			echo "</script>";			
			$URL="profile.php";
			echo "<script>location.href='$URL'</script>";
			
		}
				
	}

 if(isset($_POST['submit2'])) {
		
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$pass1 = $_POST['passord2'];
		$chat = $_POST['chat'];
		$paypal = $_POST['paypal'];
		
		if($pass == $pass1){
		$hash = password_hash($pass, PASSWORD_DEFAULT);	
		$sql = "UPDATE users SET email=:email, password=:hash, paypalId=:paypal WHERE userId=:id";
		$stmt = $MySQLi_CON->prepare($sql);
		$stmt->bindValue(":email", $email, PDO::PARAM_STR);
		$stmt->bindValue(":chat", $chat, PDO::PARAM_STR);
		$stmt->bindValue(":paypal", $paypal, PDO::PARAM_STR);
		$stmt->bindValue(":hash", $hash, PDO::PARAM_STR);
		$stmt->bindValue(":id", $id, PDO::PARAM_STR);
		$stmt->execute();
		if($stmt){
			
		echo "<script language='javascript' type='text/javascript'>";
			echo "alert('Profile Updated Successfully');";
			echo "</script>";			
			$URL="profile.php";
			echo "<script>location.href='$URL'</script>";
		}
		else{
			echo "<script language='javascript' type='text/javascript'>";
			echo "alert('Profile Fail To Be Updated');";
			echo "</script>";			
			$URL="profile.php";
			echo "<script>location.href='$URL'</script>";
			
		}
		}
		else{
			echo "<script language='javascript' type='text/javascript'>";
			echo "alert('Passwords are not the same');";
			echo "</script>";			
			$URL="profile.php";
			echo "<script>location.href='$URL'</script>";
			
		}
				
	}
		

	

?>
<link rel="stylesheet" href="css/styles.css">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1>
			My Profile
		</h1>
		<ol class="breadcrumb">
			<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">My Profile</li>
		</ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<!-- Main row (Stat box) -->
		<div class="row">
        <div class="wrap">
          <div class="right-menu">
            <a  class="active" href="#profile" id="line-bottom"><i class="fa fa-user active-profile"></i><span id="active-profile">User Info</span></a>
            <a href="#project" id="line-bottom"><i class="ionicons ion-edit project-edit"></i><span id="project-edit">Profile</span></a>
            <a href="#skills"><i class="glyphicon glyphicon-log-in skill-password"></i><span id="skill-password">Account</span></a>
          </div>
          <div class="fade in active">
            <div class="content">
              <div class="profile open animated zoomIn" id="profile">
                <div class="avatar">
                  <img src="images/avatar5.png">
                  <div class="bubble">
                    <h3><?php echo $name1 ?></h3>
                    <a href="#"></a>
                  </div>
                </div>
              </div>
              <div class="project animated zoomIn" id="project">
                <div class="avatar">
                  <div class="edit_content2">
                    <form action="#" method="post" id="edit-member-form">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name ="name" value='<?php echo $name1; ?>' placeholder="Name">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="number" value='<?php echo $mobile1; ?>' placeholder="Mobile No.">
                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                      </div>
            
              <div class="form-group has-feedback">
                 <input type="date" class="form-control" placeholder="Date of Birth" value='<?php echo $dob1; ?>' name="dob">
	         <span class="fa fa-calendar form-control-feedback"></span>
              </div>
                      <div class="form-group has-feedback">
                        <input type="text" class="form-control" name ="address" value='<?php echo $address1; ?>' placeholder="Address">
                        <span class="ionicons ion-ios-home-outline form-control-feedback"></span>
                      </div>
					  <div class="form-group has-feedback">
                        <input type="text" class="form-control" name ="experience" value='<?php echo $exp1; ?>' placeholder="Experience">
                        <span class="ionicons ion-ios-home-outline form-control-feedback"></span>
                      </div>
	            		  <div class="form-group has-feedback">
                        <input type="text" class="form-control" name ="occupation" value='<?php echo $occ1; ?>' placeholder="Occupation">
                        <span class="ionicons ion-ios-home-outline form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <script type= "text/javascript" src = "js/countries.js"></script>
                        <select id="country2" name ="country"></select>
                        <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                      </div>
                      <div class="col-xs-4 pull-right movebtn">
                        <button name="submit" id="submit" type="submit" class="btn btn-primary btn-block btn-flat update-profile-btn">Update</button>
                      </div>
                     </form>
                    </div>
                  </div>
                </div>
                <div class="skills animated zoomIn" id="skills">
                  <div class="avatar">
                    <div class="edit_content1">
                      <form action="#" method="post">
                       
                        <div class="form-group has-feedback">
                          <input type="password" name="password" class="form-control" placeholder="Current Password">
                          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                          <input type="password" name="password2" class="form-control"  placeholder="New Password">
                          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                          <div class="form-group has-feedback">
                          <input type="email" name="paypal" class="form-control" value='<?php echo $paypal1; ?>'  placeholder="Paypal Email">
                          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
						 <div class="form-group has-feedback">
                          <input type="email" name="email" class="form-control" value='<?php echo $email1; ?>' placeholder="Email">
                          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="col-xs-4 pull-right movebtn">
                          <button name="submit2" id="submit2"  type="submit2" class="btn btn-primary btn-block btn-flat edit-profile-btn">Update</button>
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
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
