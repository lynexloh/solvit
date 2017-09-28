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

	  $price = $_POST['price'];
	  $order = $_POST['orderID'];

			  	  if (isset($_POST['submit'])) {

			$sql = "UPDATE product SET payment = :price WHERE order_ID = :order";
			$stmt = $MySQLi_CON->prepare($sql);                                  
			$stmt->bindParam(':price', $price, PDO::PARAM_STR);  
			$stmt->bindParam(':order', $order, PDO::PARAM_STR);			
			$stmt->execute(); 
				
			  echo '<script language = "javascript">';
			  echo 'alert("Price set succesfully")';
			  echo '</script>';
			  echo  "<script> window.location.assign('order.php'); </script>";

				if(!$results){
					  echo '<script language = "javascript">';
			  echo 'alert("Fail to set")';
			  echo '</script>';
			   header("Location: " . $_SERVER['HTTP_REFERER']);
			exit();
					
				}
			
			}





?>