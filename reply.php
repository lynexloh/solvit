<?php
	session_start();
	include_once 'connection.php';
	$id= $_SESSION['userId'];
	if ($_SESSION['checkLogin'] != '1') {
		echo '<script language = "javascript">';
		echo 'alert("You have to login first.")';
		echo '</script>';
		echo  "<script> window.location.assign('index.php'); </script>";
		exit;
	}
	if (isset($_POST['post'])) {
		$description =$_POST['description'];
		$postID =$_POST['postId'];
		$date1 = new DateTime();
		$date1 = $date1->format('Y-m-d H:i:s');
		if (!empty($description)) {
			$st = "INSERT INTO comments(datePublished, description, upVote, downVote, userId, postId) VALUES (:date, :description, 0, 0, :user, :postID);";
			$pt = $MySQLi_CON -> prepare($st);
			$rt = $pt -> execute(array(
				":date" => $date1,
				":description" => $description,	
				":user" => $id,
				":postID" => $postID
			));

			if($rt){	

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