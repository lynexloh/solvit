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
		$order = $_GET['id'];
		$check = 1;
				$confirm = 'Yes';

		
			$query = $MySQLi_CON->prepare("SELECT post_ID From product WHERE order_ID like '$order'");
			$query->execute();
			$value = $query->fetch(PDO::FETCH_ASSOC);
			$post =  $value	['post_ID'];
			
				$stmt = "UPDATE product SET confirm =:confirm, checkIn =:check WHERE order_ID like '$order'";
				$p = $MySQLi_CON -> prepare($stmt);
					
				$results = $p -> execute(array(

				":check" => $check,
				":confirm" => $confirm,

				));
			
				if($results){
					
				$stmt1 = "DELETE from product WHERE post_ID =:post AND order_ID != :order ";
				$p1 = $MySQLi_CON -> prepare($stmt1);
					
				$results1 = $p1 -> execute(array(

				":post" => $post,
				":order" => $order,	
				));
			
					
					
			  echo '<script language = "javascript">';
			  echo 'alert("Request accepted succesfully. The other request from technicians will be deleted")';
			  echo '</script>';
			  echo  "<script> window.location.assign('order.php'); </script>";
				}
				else{
					  echo '<script language = "javascript">';
			  echo 'alert("Fail to accept problem")';
			  echo '</script>';
			   header("Location: " . $_SERVER['HTTP_REFERER']);
			exit();
					
				}
?>