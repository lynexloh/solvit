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

	$postId = $_POST['postId'];
	$postTitle = $_POST['postTitle'];
	$technicianId = $_POST['technicianId'];
	$clientId = $_POST['writerId'];
	$clientName = $_POST['clientName'];
	$priceOffered = $_POST['price'];
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date1 = new DateTime();
	$date1 = $date1 ->format('Y-m-d H:i:s');

	if (isset($_POST['submit'])) {
		$stmt = "INSERT INTO offers (dateOffered, priceOffered, postTitle, clientName, offerStatus, repairStatus, paymentStatus, clientId, technicianId, postId) VALUES (:date1, :price, :postTitle, :clientName, 'Pending', 'Not Started', 'Not Paid', :clientId, :technicianId, :postId);";
		$p = $MySQLi_CON -> prepare($stmt);
		$results = $p -> execute(array(
			":date1" => $date1,
			":price" => $priceOffered,
			":postTitle" => $postTitle,
			":clientName" => $clientName,
			":clientId" => $clientId,
			":technicianId" => $technicianId,
			":postId" => $postId
		));
		echo '<script language = "javascript">';
		echo 'alert("Offer sent succesfully")';
		echo '</script>';
		echo  "<script> window.location.assign('order.php'); </script>";
		if(!$results){
			echo '<script language = "javascript">';
			echo 'alert("Fail to send offer")';
			echo '</script>';
			header("Location: " . $_SERVER['HTTP_REFERER']);
			exit();
		}
	}
?>