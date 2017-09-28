<?php
session_start();

include_once 'connection.php';
$id= $_SESSION['userSession'];


   if ($_SESSION['checkLogin'] != '1') {

          echo '<script language = "javascript">';
          echo 'alert("You have to login first.")';
          echo '</script>';
          echo  "<script> window.location.assign('index.php'); </script>";
          exit;
          }

		  

		  
		  if (isset($_POST['post'])) {
			  
		  $description =$_POST['reply'];
		  $postID =$_POST['postID'];
		   $date1 = new DateTime();
         $date1 = $date1->format("Y-m-d");
			if (!empty($description)) {
				
					$st = "INSERT INTO reply(date, comments, user_ID, post_ID) VALUES (:date, :description, :user, :postID);";
				$pt = $MySQLi_CON -> prepare($st);
					
				$rt = $pt -> execute(array(
				":date" => $date1,
				":description" => $description,	
				":user" => $id,
				":postID" => $postID
				));
				$lastId = $MySQLi_CON ->lastInsertId();
			
				
			if($rt){	
			
					
				$stmt = "INSERT INTO links (user_ID, post_ID, reply_ID) VALUES (:user, :postID,:replyID);";
				$p = $MySQLi_CON -> prepare($stmt);
					
				$results = $p -> execute(array(
				":user" => $id,
				":postID" => $postID,
				":replyID" => $lastId
				));
			
			  echo '<script language = "javascript">';
			  echo 'alert("Commented successfully")';
			  echo '</script>';
			  
			header("Location: " . $_SERVER['HTTP_REFERER']);
			exit();
			}
				else{
					  echo '<script language = "javascript">';
			  echo 'alert("Fail to post")';
			  echo '</script>';
			 header("Location: " . $_SERVER['HTTP_REFERER']);
			exit();
					
				}
			
			
			
			}
			  else{

			  echo '<script language = "javascript">';
			  echo 'alert("Please fill in all the field.")';
			  echo '</script>';
			  header("Location: " . $_SERVER['HTTP_REFERER']);
			exit();
          } 
	  
			}
        





?>