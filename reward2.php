<?php
	// to include the file containing the link to the database.
	include("connection.php");
	
	session_start();
	$id = $_SESSION['userSession'];

	$ids = $_GET['id'];

		 $query = "SELECT points FROM user WHERE user_ID = $id";
		 $stmt = $MySQLi_CON->prepare($query);
		 $stmt->execute();
		 if ($stmt->rowCount() > 0) { 
			$result = $stmt->fetchAll();
			foreach( $result as $row ) {
				$point = $row["points"];		
			}
		}

		$query1 = "SELECT * FROM reward WHERE reward_ID ='$ids'";
		 $stmt1 = $MySQLi_CON->prepare($query1);
		 $stmt1->execute();
			$result1 = $stmt1->fetchAll();
			foreach( $result1 as $row1 ) {
				$productName = $row1["name"];
				$productPrice = $row1["points"];					
			}

		if($point>=$productPrice && $point >0){

		date_default_timezone_set("Asia/Kuala_Lumpur");
         $date1 = new DateTime();
         $date1 = $date1->format("Y-m-d H:i:s");


		$stmt = "INSERT INTO user_reward (reward_ID,user_ID,date) VALUES (:rID, :id, :date1);";
		$p = $MySQLi_CON -> prepare($stmt);

		$results = $p -> execute(array(

		":date1" => $date1,
		":id" => $id,
		":rID" => $ids
		));
			if ($results!=0) {
	
				$setPoint = "UPDATE user SET points = (points -  $productPrice) WHERE user_ID = '$id'";
				$sp = $MySQLi_CON -> prepare($setPoint);
				$sp->execute();
		
				echo '<script language = "javascript">';
				  echo 'alert("Reward claimed successfully")';
				  echo '</script>';
				  echo  "<script> window.location.assign('rewards.php'); </script>";
			}
		  else{
			echo  "<script> window.location.assign('reward.php'); </script>";
		  }
	}
	else{
			echo '<script language = "javascript">';
          echo 'alert("You have insufficient points")';
          echo '</script>';
          echo  "<script> window.location.assign('reward.php'); </script>";
	}

?>
