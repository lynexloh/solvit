<?php
session_start();
$_SESSION['checkLogin'] = '';
include("connection.php");

if(isset($_POST['submit'])){
    $email = $_POST['email'];
	$upass = $_POST['password'];
	$upass2 = $_POST['password2'];
	$name = $_POST['name'];
	$type = "User";
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date1 = new DateTime();
	$date1 = $date1 ->format('Y-m-d H:i:s');
	$pass = password_hash($upass, PASSWORD_DEFAULT);
	if (!empty($email) && !empty($upass) && !empty($name)) {	
		$sql = "SELECT * FROM users where email = '$email'";
		$res = $MySQLi_CON->prepare($sql);
		$res1 = $res->execute();
		$record = $res->fetchAll();
		if(count($record) > 0){
			echo '<script language = "javascript">';
			echo 'alert("This email has already exist")';
			echo '</script>';
			echo  "<script> window.location.assign('index.php'); </script>";
		}
		else{
			if($upass == $upass2){
				$stmt = "INSERT INTO users (userName, email, password,userType,dateCreated) VALUES (:name,:email,:password,:type,:date);";
				$p = $MySQLi_CON -> prepare($stmt);		
				$results = $p -> execute(array(
					":name" => $name,
					":email" => $email,
					":type" => $type,
					":date" => $date1,
					":password" => $pass,
				));
				echo '<script language = "javascript">';
				echo 'alert("Register successfully")';
				echo '</script>';
				echo  "<script> window.location.assign('index.php'); </script>";
				if(!$results){
					echo '<script language = "javascript">';
					echo 'alert("Fail to register")';
					echo '</script>';
					echo  "<script> window.location.assign('index.php'); </script>";
				}
			}
			else{
				echo '<script language = "javascript">';
				echo 'alert("The passwords are not the same")';
				echo '</script>';
				echo  "<script> window.location.assign('index.php'); </script>";	
			}
		}
	}
    else{
		echo '<script language = "javascript">';
		echo 'alert("Please fill all the field.")';
		echo '</script>';
		echo  "<script> window.location.assign('index.php'); </script>";
    }   
}
?>