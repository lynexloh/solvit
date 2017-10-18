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

	$title = $_POST['title'];
	$type = $_POST['type'];
	$modal = $_POST['modal'];
	$problem = $_POST['problem'];
	$method = $_POST['method'];
	$description =$_POST['description'];
	$date1 = new DateTime();
	$date1 = $date1->format("Y-m-d");

	if (isset($_POST['post'])) {	
		
		$file = rand(1000,100000)."-".$_FILES['file']['name'];
		$file_loc = $_FILES['file']['tmp_name'];
		$file_size = $_FILES['file']['size'];
		$file_type = $_FILES['file']['type'];
		$folder="imageUploaded/";
		 
		// new file size in KB
		$new_size = $file_size/1024;  
		// new file size in KB
		 
		// make file name in lower case
		$new_file_name = strtolower($file);
		// make file name in lower case 
		$final_file=str_replace(' ','-',$new_file_name);
				 
		if(move_uploaded_file($file_loc,$folder.$final_file)){

			if (!empty($title)) {
				$stmt = "INSERT INTO posts (postTitle, itemType, itemModal, problemType, repairMethodRequested, problemDescription, datePublished, image, userId) VALUES (:title, :type, :modal, :problem, :method, :description, :date, :image, :id)";
				$p = $MySQLi_CON -> prepare($stmt);

				$results = $p -> execute(array(
					":title" => $title,
					":type" => $type,
					":modal" => $modal,
					":problem" => $problem,
					":method" => $method,
					":date" => $date1,
					":id" => $id,
					":image" => $final_file,
					":description" => $description
				));
				echo '<script language = "javascript">';
				echo 'alert("Post successfully")';
				echo '</script>';
				echo  "<script> window.location.assign('solvit2.php'); </script>";
				if(!$results){
					echo '<script language = "javascript">';
					echo 'alert("Fail to post")';
					echo '</script>';
				}
			}
			else{
				echo '<script language = "javascript">';
				echo 'alert("Please fill all the field.")';
				echo '</script>';
				header("Location: " . $_SERVER['HTTP_REFERER']);
				exit();
			} 
		}
		else{
			echo '<script language = "javascript">';
			echo 'alert("Error while uploading file")';
			echo '</script>';
			header("Location: " . $_SERVER['HTTP_REFERER']);
		}
	}


?>