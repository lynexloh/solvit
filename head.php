<?php
	error_reporting(0);
	session_start();
	include_once 'connection.php';
	
	$sql = "SELECT count(*) FROM users"; 
	$result = $MySQLi_CON->prepare($sql); 
	$result->execute(); 
	$number = $result->fetchColumn(); 
	
	$sql1 = "SELECT count(*) FROM posts"; 
	$result1 = $MySQLi_CON->prepare($sql1); 
	$result1->execute(); 
	$post = $result1->fetchColumn(); 	
	
	include_once 'dbController.php';
	$db_handle = new DBController();
	if ($_SESSION['checkLogin'] != '1') {
		echo '<script language = "javascript">';
		echo 'alert("You have to login first.")';
		echo '</script>';
		echo  "<script> window.location.assign('index.php'); </script>";
		exit;
	}
		  
	$id = $_SESSION['userId'];				 
	$stmt3 =  $db_handle->runQuery("SELECT * from users WHERE userId LIKE $id"); 
	foreach( $stmt3 as $row ) {
    	$name= $row["userName"];
		$email = $row["email"];
		$birthdate= $row["dateOfBirth"];
		$occ= $row["occupation"];
		$mobile= $row["contactNumber"];
		$experience= $row["experience"];
		$date= $row["dateCreated"];
		$type= $row["userType"];
		$status= $row["userStatus"];
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $tag?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
	<link href="css/htmlfromrss.css" rel="stylesheet" type="text/css" />
  
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<!-- The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! -->
	<script src="js/prefixfree.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>

	<link href="style/style.css" rel="stylesheet" type="text/css" />

	<style type="text/css"> 
		.row2 {
					display: inline-table;
					width: calc(50% - 200px);
					padding: 100px;
					padding-top: 20px;
					margin: 0px;
				
				}
				.demo {
					padding: 0px;
					margin: 0px;
					color: #333;
					
					width: 100%;
				}
			
		@media only screen and (min-width: 960px) and (max-width: 1045px) {
					.row2 {
						width: calc(50% - 80px);
						padding: 40px;
							margin-top:-5px;
					}
					img{

					 width: 100%;
					height: auto;
					
				}
				}
				@media only screen and (min-width: 768px) and (max-width: 959px) {
					.row2 {
						width: calc(50% - 60px);
						padding: 30px;
							margin-top:-5px;
					}
					img{

					 width: 100%;
					height: auto;
					
				}
				}
				@media only screen and (min-width: 480px) and (max-width: 767px) {
					.row2 {
						display: block;
						width: 350px;
						margin: 150px auto;
							margin-top:-30px;
					}
					img{

					 width: 100%;
					height: auto;
					
				}
				}
				@media screen and (max-width:479px){
					.row2 {
						display: block;
						width: calc(100% - 1px);
						padding: 10px;
						margin-top:-30px;
						margin-bottom:80px;
					}
					img{

					 width: 100%;
					height: auto;
					
				}
				}


		 
		 
		 .img-thumbnail{border:0;}
		 
		.image-preview-input {
			position: relative;
			overflow: hidden;
			margin: 0px;    
			color: #333;
			background-color: #fff;
			border-color: #ccc;    
		}
		.image-preview-input input[type=file] {
			position: absolute;
			top: 0;
			right: 0;
			margin: 0;
			padding: 0;
			font-size: 20px;
			cursor: pointer;
			opacity: 0;
			filter: alpha(opacity=0);
		}
		.image-preview-input-title {
			margin-left:2px;
		}
		 .animated {
						-webkit-transition: height 0.2s;
						-moz-transition: height 0.2s;
						transition: height 0.2s;
					}
		.btn3d:active:focus,
		.btn3d:focus:hover,
		.btn3d:focus {
			-moz-outline-style:none;
				 outline:medium none;
		}
		.btn3d:active, .btn3d.active {
			top:2px;
		}
		.btn3d.btn-white {
			color: #666666;
			box-shadow:0 0 0 1px #ebebeb inset, 0 0 0 2px rgba(255,255,255,0.10) inset, 0 8px 0 0 #f5f5f5, 0 8px 8px 1px rgba(0,0,0,.2);
			background-color:#fff;
		}
		.btn3d.btn-white:active, .btn3d.btn-white.active {
			color: #666666;
			box-shadow:0 0 0 1px #ebebeb inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,.1);
			background-color:#fff;
		}
		.btn3d.btn-default {
			color: #666666;
			box-shadow:0 0 0 1px #ebebeb inset, 0 0 0 2px rgba(255,255,255,0.10) inset, 0 8px 0 0 #BEBEBE, 0 8px 8px 1px rgba(0,0,0,.2);
			background-color:#f9f9f9;
		}
		.btn3d.btn-default:active, .btn3d.btn-default.active {
			color: #666666;
			box-shadow:0 0 0 1px #ebebeb inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,.1);
			background-color:#f9f9f9;
		}
		.btn3d.btn-primary {
			box-shadow:0 0 0 1px #417fbd inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #4D5BBE, 0 8px 8px 1px rgba(0,0,0,0.5);
			background-color:#4274D7;
		}
		.btn3d.btn-primary:active, .btn3d.btn-primary.active {
			box-shadow:0 0 0 1px #417fbd inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,0.3);
			background-color:#4274D7;
		}
		.btn3d.btn-success {
			box-shadow:0 0 0 1px #31c300 inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #5eb924, 0 8px 8px 1px rgba(0,0,0,0.5);
			background-color:#78d739;
		}
		.btn3d.btn-success:active, .btn3d.btn-success.active {
			box-shadow:0 0 0 1px #30cd00 inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,0.3);
			background-color: #78d739;
		}
		.btn3d.btn-info {
			box-shadow:0 0 0 1px #00a5c3 inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #348FD2, 0 8px 8px 1px rgba(0,0,0,0.5);
			background-color:#39B3D7;
		}
		.btn3d.btn-info:active, .btn3d.btn-info.active {
			box-shadow:0 0 0 1px #00a5c3 inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,0.3);
			background-color: #39B3D7;
		}
		.btn3d.btn-warning {
			box-shadow:0 0 0 1px #d79a47 inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #D79A34, 0 8px 8px 1px rgba(0,0,0,0.5);
			background-color:#FEAF20;
		}
		.btn3d.btn-warning:active, .btn3d.btn-warning.active {
			box-shadow:0 0 0 1px #d79a47 inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,0.3);
			background-color: #FEAF20;
		}
		.btn3d.btn-danger {
			box-shadow:0 0 0 1px #b93802 inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #AA0000, 0 8px 8px 1px rgba(0,0,0,0.5);
			background-color:#D73814;
		}
		.btn3d.btn-danger:active, .btn3d.btn-danger.active {
			box-shadow:0 0 0 1px #b93802 inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,0.3);
			background-color: #D73814;
		}
		.btn3d.btn-magick {
			color: #fff;
			box-shadow:0 0 0 1px #9a00cd inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #9823d5, 0 8px 8px 1px rgba(0,0,0,0.5);
			background-color:#bb39d7;
		}
		.btn3d.btn-magick:active, .btn3d.btn-magick.active {
			box-shadow:0 0 0 1px #9a00cd inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,0.3);
			background-color: #bb39d7;
		}
		
		.post div{
			height:15px;
		}
	</style>
</head>

<body class="hold-transition skin-red sidebar-mini">
	<div class="wrapper">
	<header class="main-header">
		<!-- Logo -->
		<a href="#" class="logo">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini"><b>S</b>I</span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg"><b>Solv</b>IT</span>
		</a>

		<!-- Header Navbar -->
		<nav class="navbar navbar-static-top" role="navigation">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
				<span class="sr-only">Toggle navigation</span>
			</a>
			<!-- Navbar Right Menu -->
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<!-- Messages: style can be found in dropdown.less-->
			  
					<!-- /.messages-menu -->

					<!-- User Account Menu -->
					<li class="dropdown user user-menu">
						<!-- Menu Toggle Button -->
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<!-- The user image in the navbar-->
							<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
							<!-- hidden-xs hides the username on small devices so only the image appears. -->
							<span class="hidden-xs"><?php echo $name?></span>
						</a>
						<ul class="dropdown-menu">
							<!-- The user image in the menu -->
							<li class="user-header">
								<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
								<p>
									<?php echo $name?> - <?php echo $occ?>
									<small><?php echo $type ?> since <?php echo $date?></small>
								</p>
							</li>
							<!-- Menu Body -->
							<!-- Menu Footer-->
							<li class="user-footer">
								<div class="pull-left">
									<a href="profile.php" class="btn btn-default btn-flat">Profile</a>
								</div>
								<div class="pull-right">
									<a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	  
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- Sidebar user panel (optional) -->
			<div class="user-panel">
				<div class="pull-left image">
					<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
					<p><?php echo $name ?></p>
					<a href="#"><i class="fa fa-circle text-success"></i> <?php echo $status?></a>
				</div>
			</div>
			<!-- search form (Optional) -->
			<form action="search.php" method="post" class="sidebar-form">
				<div class="input-group">
					<input type="text" name="searchWord" class="form-control" placeholder="Search For User">
					<span class="input-group-btn">
						<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
						</button>
					</span>
				</div>
			</form>
			<!-- /.search form -->
			<?php 
				if($type=="User" || $type =="Technician"){
			?>
			<!-- Sidebar Menu -->
			<ul class="sidebar-menu">
				<li class ="<?php echo "header";?>">Navigation</li>
				<!-- Optionally, you can add icons to the links -->
				<li class ="<?php echo "$starter";?>"><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
				<li class ="<?php echo "$order";?>">
					<a href="order.php">
						<i class="fa fa-shopping-cart"></i> <span>Offer</span>
					</a>
				</li>
				<li class ="<?php echo "$solve";?>">
					<a href="solvit2.php"><i class="fa fa-link"></i> <span>Posts</span></a>
				</li>
				

			</ul>
			<?php
			}
			else{
			?>
			<ul class="sidebar-menu">
				<li class ="<?php echo "header";?>">Navigation</li>
				<!-- Optionally, you can add icons to the links -->
					<li class ="<?php echo "$starter";?>"><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
				<li class ="<?php echo "$tech";?>">
					<a href="#"><i class="glyphicon glyphicon-wrench"></i> <span>Technician</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
					</a>
					<ul class="treeview-menu">
						<li class ="<?php echo "$tech1";?>"><a href="technician.php"><i class="fa fa-circle-o"></i>Create Technician</a></li>
						<li class ="<?php echo "$tech2";?>"><a href="technician2.php"><i class="fa fa-circle-o"></i>View Technician</a></li>
					</ul>
				</li>
				<li class ="<?php echo "$user2";?>"><a href="user.php"><i class="fa fa-user"></i> <span>User</span></a></li>	
						  
			</ul>
			<?php		
			}
			?>
		<!-- /.sidebar-menu -->
		</section>
		<!-- /.sidebar -->
	</aside>