<?php
	session_start();
	include 'connection.php';
	//save Trasaction information form PayPal
	$item_number = $_SESSION['number']; 
	$payment_gross = $_SESSION['amt'];
	$currency_code = $_SESSION['code'];
	$payment_status = "Paid";
	//$order_id = $_SESSION['order'];
	$productResult = ("SELECT * FROM offers WHERE offerId = '$item_number'");
	$stmt = $MySQLi_CON->prepare($productResult);
	$stmt->execute();
	$products = $stmt->fetchAll();
	foreach ($products as $rows) {
		$productPrice = $rows['priceOffered'];
		$userID = $rows['technicianId'];
		$clientId = $rows['clientId'];
	}
	if($payment_gross == $productPrice){
		//Check if payment data exists with the same TXN ID.
		$prevPaymentResult = ("SELECT * FROM transactions  WHERE order_ID = '$item_number'");
		$result = $MySQLi_CON->prepare($prevPaymentResult); 
		$result->execute(); 
		$number_of_rows = $result->fetchColumn(); 
		if($number_of_rows > 0){
			/*
			$paymentRow = $prevPaymentResult->fetch_assoc();
			$last_insert_id = $paymentRow['payment_id'];
			*/
			echo '<script language = "javascript">';
			echo 'alert("You have actually made payment to this order")';
			echo '</script>';
			echo  "<script> window.location.assign('order.php'); </script>";
		}
		else{
			date_default_timezone_set("Asia/Kuala_Lumpur");
			$date1 = new DateTime();
			$date1 = $date1 ->format('Y-m-d H:i:s');
			//Insert tansaction data into the database
			$insert = "INSERT INTO transactions(transactionDate,amountPaid,userId,offerId) VALUES('$date1','".$payment_gross."','".$clientId."','".$item_number."')";
			$inserts = $MySQLi_CON->prepare($insert);
			$inserts->execute();
			$insert2 = "UPDATE offers set paymentStatus = 'Paid' where offerId LIKE '".$item_number."'";
			$inserts2 = $MySQLi_CON->prepare($insert2);
			$inserts2->execute();
			$insert3 = ("UPDATE users set pointsCollected = (pointsCollected + ('$productPrice' *0.1)) where userId LIKE '$userID'");
			$inserts3 = $MySQLi_CON->prepare($insert3);
			$inserts3->execute();

			echo  "<script> window.location.assign('order.php'); </script>";
		}
	}
?>