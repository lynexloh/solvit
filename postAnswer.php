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

	  $title = $_POST['title'];
		$type = $_POST['type'];
		$modal = $_POST['modal'];
		$problem = $_POST['problem'];
		//$imageUp= $_POST['image'];
		  $method = $_POST['method'];
		  $description =$_POST['description'];
		   $date1 = new DateTime();
         $date1 = $date1->format("Y-m-d");
		
		  	$name     = $_FILES['file']['name'];
			$tmpName  = $_FILES['file']['tmp_name'];
			$error    = $_FILES['file']['error'];
			$size     = $_FILES['file']['size'];
			$ext	  = strtolower(pathinfo($name, PATHINFO_EXTENSION));

		  if (isset($_POST['post'])) {
		
			/*
			    $tempname = $_FILES['image']['tmp_name'];
				$originalname =$_FILES['image']['name'];
				$size =($_FILES['image']['size']/5242888). "MB<br>";
				$type=$_FILES['image']['type'];
				$image=$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],"picture/".$_FILES['image']['name']);
			*/
			/*
			 $target_dir = "picture/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$image=basename( $_FILES["image"]["name"],".jpg");
	*/
	
	$targetPath =  dirname( __FILE__ ) . DIRECTORY_SEPARATOR. 'picture' . DIRECTORY_SEPARATOR. $name;
				move_uploaded_file($tmpName,$targetPath); 
	
			if (!empty($title)) {	
		
				$stmt = "INSERT INTO post (title, type, modal, problem, method, description, date, user_ID,image) VALUES (:title, :type, :modal, :problem, :method, :description, :date, :id,:image)";
				$p = $MySQLi_CON -> prepare($stmt);
					
				$results = $p -> execute(array(

				":title" => $title,
				":type" => $type,
				":modal" => $modal,
				":problem" => $problem,
				":method" => $method,
					":image" => $name,
					":date" => $date1,
					":id" => $id,
					//":image" => $image,
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
       
?>