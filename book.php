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

	  $post = $_POST['postID'];
		$user = $_POST['userID'];
		$writer = $_POST['writerID'];
		$type = $_POST['type'];
		$problem = $_POST['problem'];
		$name = $_POST['name'];
		$status = "IN PROGRESS";
		$confirm = "No";
			$method = $_POST['method'];
		  //$topic = $_POST['topic'];
		   $date1 = new DateTime();
         $date1 = $date1->format("Y-m-d");

			  	  if (isset($_POST['accept'])) {

				$stmt = "INSERT INTO product (date, type, name, status, problem, method, user_ID, expert_ID, post_ID, confirm) VALUES (:date1, :type, :name, :status, :problem, :method, :user, :writer, :post,:confirm);";
				$p = $MySQLi_CON -> prepare($stmt);
					
				$results = $p -> execute(array(

				":date1" => $date1,
				":type" => $type,	
				":problem" => $problem,
				":name" => $name,
								":confirm" => $confirm,

				":status" => $status,
				":method" => $method,
						":user" => $writer,
					":writer" => $user,
					":post" => $post
				));
				
			  echo '<script language = "javascript">';
			  echo 'alert("Product accepted succesfully")';
			  echo '</script>';
			  echo  "<script> window.location.assign('order.php'); </script>";

				if(!$results){
					  echo '<script language = "javascript">';
			  echo 'alert("Fail to order")';
			  echo '</script>';
			   header("Location: " . $_SERVER['HTTP_REFERER']);
			exit();
					
				}
			
			}





?>