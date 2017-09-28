<?php

session_start();

include 'connection.php';

//save Trasaction information form PayPal
$item_number = $_SESSION['number']; 
$payment_gross =$_SESSION['amt'];
$currency_code = $_SESSION['code'];
$payment_status = "Paid";
//$order_id = $_SESSION['order'];
		
		$productResult = ("SELECT * FROM product WHERE order_ID = '$item_number'");
		$stmt = $MySQLi_CON->prepare($productResult);
		$stmt->execute();
		$products = $stmt->fetchAll();
		foreach ($products as $rows) {
				$productPrice = $rows['payment'];
				$userID = $rows['expert_ID'];
		}

if($payment_gross == $productPrice){
	//Check if payment data exists with the same TXN ID.
    $prevPaymentResult = ("SELECT payment_id FROM payments  WHERE order_ID = '$item_number'");
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
    }else{
        //Insert tansaction data into the database
        $insert = ("INSERT INTO payments(currency_code,payment_status,order_ID) VALUES('".$currency_code."','".$payment_status."','".$item_number."')");
       $inserts = $MySQLi_CON->prepare($insert);
		$inserts->execute();
		 $insert2 = ("UPDATE product set status = 'Paid' where order_ID LIKE '$item_number'");
       $inserts2 = $MySQLi_CON->prepare($insert2);
		$inserts2->execute();
		 $insert3 = ("UPDATE user set points = (points + ('$productPrice' *0.5)) where user_ID LIKE '$userID'");
       $inserts3 = $MySQLi_CON->prepare($insert3);
		$inserts3->execute();
		
	 //  $last_insert_id = $db->insert_id;
    }

?>
	<h1>Your payment has been successful.</h1>
		<a href="order.php"><h1>Click here to redirect to the main page</h1></a>

    <!--<h1>Your Payment ID - <?php echo $last_insert_id; ?>.</h1>-->
	
<?php
}else{

?>
	<h1>Your payment has failed.</h1>
<?php
}
?>



