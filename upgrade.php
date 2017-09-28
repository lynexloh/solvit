<?php
	include("connection.php");		
	
					$userid = $_GET['ids'];
					$job = 'Technician';
					
					
					
			$stmt = "UPDATE USER SET type = '$job' where user_ID LIKE '$userid';";
				$p = $MySQLi_CON -> prepare($stmt);
					
				$results = $p -> execute();
				if($results){
			  echo '<script language = "javascript">';
			  echo 'alert("User upgraded succesfully")';
			  echo '</script>';
			  echo  "<script> window.location.assign('order.php'); </script>";
				}
  ?>