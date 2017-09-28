<?php
session_start();
include("connection.php");
	$id = $_SESSION['userSession'];


	 if ($_SESSION['checkLogin'] != '1') {

          echo '<script language = "javascript">';
          echo 'alert("You have to login first.")';
          echo '</script>';
          echo  "<script> window.location.assign('index.php'); </script>";
          exit;
          }


if(isset($_POST['submit'])){

      $point = $_POST['point'];
	$name = $_POST['name'];
	$status = $_POST['status'];

	date_default_timezone_set("Asia/Kuala_Lumpur");
		$date1 = new DateTime();
		$date1 = $date1 ->format('Y-m-d H:i:s');

          if (!empty($point) && !empty($name) && !empty($status)) {		
				$stmt = "INSERT INTO reward (name, points, status,date) VALUES (:name,:point,:status,:date);";
				$p = $MySQLi_CON -> prepare($stmt);
					
				$results = $p -> execute(array(

				":name" => $name,
				":point" => $point,
								":date" => $date1,

				":status" => $status
				));
			  echo '<script language = "javascript">';
			  echo 'alert("Reward created successfully")';
			  echo '</script>';
			  echo  "<script> window.location.assign('createreward.php'); </script>";

				if(!$results){
					  echo '<script language = "javascript">';
			  echo 'alert("Fail to create reward")';
			  echo '</script>';
			  echo  "<script> window.location.assign('createreward.php'); </script>";
					
				}
	
				}
          else{

			  echo '<script language = "javascript">';
			  echo 'alert("Please fill all the field.")';
			  echo '</script>';
			  echo  "<script> window.location.assign('createreward.php'); </script>";
          } 
	  
      
	}
?>