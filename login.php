<?php
session_start();
$_SESSION['checkLogin'] = '';
include("connection.php");
if(isset($_POST['submit'])){
    $email = $_POST['email'];
	$upass = $_POST['password'];
        if (!empty($email) && !empty($upass)) {		
			$records = $MySQLi_CON->prepare("SELECT * FROM users WHERE email = :email");
			$records->bindParam(':email', $email);
			$records->execute();
			$value = $records->fetch(PDO::FETCH_ASSOC);
			if(count($value) > 0 && password_verify($upass, $value['password']) ){
				
				$_SESSION['userId'] = $value['userId'];
	            $_SESSION['userEmail'] = $value['email'];
	            $_SESSION['userPass'] = $value['password'];
				$_SESSION['userName'] = $value['userName'];
				$_SESSION['userType'] = $value['userType'];
				$_SESSION['userOcc'] = $value['occupation'];
				$_SESSION['userBirth'] = $value['dateOfBirth'];
				$_SESSION['userMob'] = $value['contactNumber'];
				$_SESSION['userEx'] = $value['experience'];
				$status = "Online";
				
				$_SESSION['checkLogin'] = '1';
				$id = $_SESSION['userId'];
				
				$sql = "UPDATE users SET userStatus=:status WHERE userId=:id";
				$stmt = $MySQLi_CON->prepare($sql);
				$stmt->bindValue(":status", $status, PDO::PARAM_STR);
				$stmt->bindValue(":id",$id , PDO::PARAM_STR);
				$stmt->execute();
											
				header("location:dashboard.php");
			}
			else{
				echo '<script language = "javascript">';
				echo 'alert("Email and Password are not found.")';
				echo '</script>';
				echo  "<script> window.location.assign('index.php'); </script>";
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