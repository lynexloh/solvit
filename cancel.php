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
			$orderID = $_POST['orderID'];
  
  
			  	  if (isset($_POST['accept'])) {
		
				$sql = "DELETE FROM product WHERE order_ID =  :orderID";
				$stmt = $MySQLi_CON->prepare($sql);
				$stmt->bindParam(':orderID', $orderID, PDO::PARAM_INT);   
				$stmt->execute();
				
	
			  echo '<script language = "javascript">';
			  echo 'alert("Order cancelled succesfully")';
			  echo '</script>';
			  echo  "<script> window.location.assign('order.php'); </script>";

				if(!$stmt){
					  echo '<script language = "javascript">';
			  echo 'alert("Fail to cancel")';
			  echo '</script>';
			   header("Location: " . $_SERVER['HTTP_REFERER']);
			exit();
					
				}
			
			}





?>