<?php
session_start();
$_SESSION['checkLogin'] = '';
include("connection.php");
if(isset($_POST['submit'])){
      $email = $_POST['email'];
	$upass = $_POST['password'];
          if (!empty($email) && !empty($upass)) {		
			$records = $MySQLi_CON->prepare("SELECT * FROM user WHERE email = :email");
			$records->bindParam(':email', $email);
			$records->execute();
			$value = $records->fetch(PDO::FETCH_ASSOC);
			if(count($value) > 0 && password_verify($upass, $value['password']) ){
				
				$_SESSION['checkLogin'] = '1';
				 $_SESSION['userSession'] = $value['user_ID'];
	             $_SESSION['userEmail'] = $value['email'];
	             $_SESSION['userPass'] = $value['password'];
				$_SESSION['userName'] = $value['user_Name'];
				$_SESSION['userOcc'] = $value['occupation'];
				$_SESSION['userBirth'] = $value['birthdate'];
				$_SESSION['userMob'] = $value['mobile'];
				$_SESSION['userEx'] = $value['experience'];
				$status = "Online";
				$id = $_SESSION['userSession'];
				
				$sql = "UPDATE user SET status=:status WHERE user_ID=:id";
				$stmt = $MySQLi_CON->prepare($sql);
				
				$stmt->bindValue(":status", $status, PDO::PARAM_STR);
				$stmt->bindValue(":id",$id , PDO::PARAM_STR);
				$stmt->execute();
				
				
	
				//$add= $MySQLi_CON->prepare("create procedure updateVotes() update user set votes = (select sum(votes) from links where links.user_ID = user.user_ID) where user.user_ID = '$id';");
				//$add->execute();
				//$add2 = $MySQLi_CON->prepare("CREATE Trigger upd_check  AFTER UPDATE ON links FOR EACH ROW call updateVotes();");
				//$add2->execute();
					
				
				//create procedure updateVotes() update user set age = (select sum(vote) from vote where user_id = 1);
				//CREATE Trigger upd_check  AFTER UPDATE ON vote FOR EACH ROW call updateVotes();
						
									
				header("location:starter.php");
	
				
			}else{
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