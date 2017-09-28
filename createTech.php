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

      $email = $_POST['email'];
	$upass = $_POST['password'];
	$upass2 = $_POST['password2'];
	$name = $_POST['name'];
	$address = $_POST['address'];
		$chat = $_POST['chat'];
			$paypal = $_POST['paypal'];
	$dob = $_POST['dob'];
	$type = "Technician";

	date_default_timezone_set("Asia/Kuala_Lumpur");
		$date1 = new DateTime();
		$date1 = $date1 ->format('Y-m-d H:i:s');
		
	 $pass = password_hash($upass, PASSWORD_DEFAULT);
          if (!empty($email) && !empty($upass) && !empty($name)) {
			$sql = "SELECT * FROM user where email = '$email'";
		  $res = $MySQLi_CON ->prepare($sql);
		  $res1 = $res -> execute();
			
		  $record = $res->fetchAll();
		  
		   if(count($record) > 0){
			  echo '<script language = "javascript">';
			  echo 'alert("This email has already exist")';
			  echo '</script>';
			  echo  "<script> window.location.assign('index.php'); </script>";
			 }
		  
		  
		  else{
				if($upass == $upass2){
				$stmt = "INSERT INTO user (user_Name, email, password,type, address, birthdate,date, paypal, chat) VALUES (:name,:email,:password, :type, :address, :dob,:date ,:paypal, :chat);";
				$p = $MySQLi_CON -> prepare($stmt);
					
				$results = $p -> execute(array(

				":name" => $name,
				":email" => $email,
				":type" => $type,
				":address" => $address,
				":chat" => $chat,
				":paypal" => $paypal,
				":dob" => $dob,
								":date" => $date1,

				":password" => $pass,
				));
			  echo '<script language = "javascript">';
			  echo 'alert("Technician created successfully")';
			  echo '</script>';
			  echo  "<script> window.location.assign('technician.php'); </script>";

				if(!$results){
					  echo '<script language = "javascript">';
			  echo 'alert("Fail to create technician")';
			  echo '</script>';
			  echo  "<script> window.location.assign('technician.php'); </script>";
					
				}
				}
				else{
					 echo '<script language = "javascript">';
			  echo 'alert("The passwords are not the same")';
			  echo '</script>';
			  echo  "<script> window.location.assign('technician.php'); </script>";
					
				}
				
				
		  }	
          }
          else{

			  echo '<script language = "javascript">';
			  echo 'alert("Please fill all the field.")';
			  echo '</script>';
			  echo  "<script> window.location.assign('technician.php'); </script>";
          } 
	  
      
	}
?>