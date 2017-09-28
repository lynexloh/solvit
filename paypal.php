<?php
session_start();
include 'connection.php';
	 if ($_SESSION['checkLogin'] != '1') {

          echo '<script language = "javascript">';
          echo 'alert("You have to login first.")';
          echo '</script>';
          echo  "<script> window.location.assign('index.php'); </script>";
          exit;
          }
	
	
	$ids = $_GET['id'];
	$stmt3 = $MySQLi_CON->prepare("SELECT * from product WHERE order_ID LIKE '$ids'"); 
	$stmt3->execute(); 
	$result3 = $stmt3->fetchAll();
	foreach( $result3 as $row ) {
    	
		$date= $row["date"];
		$type= $row["type"];
		$problem= $row["problem"];
		$points= $row["points"];
		$fee= $row["fee"];
		$user_ID= $row["user_ID"];
		$expert_ID= $row["expert_ID"];
		$post_ID= $row["post_ID"];
		$method= $row["method"];
		$name= $row["name"];
		$payment= $row["payment"];
	}	

	$stmt1 = $MySQLi_CON->prepare("SELECT * from user WHERE user_ID LIKE '$expert_ID'"); 
	$stmt1->execute(); 
	$result1 = $stmt1->fetchAll();
	foreach( $result1 as $row1) {
    	
		$ename= $row1["user_Name"];
		$eemail= $row1["email"];
		$emobile= $row1["mobile"];
		$paypal= $row1["paypal"];
	}	
	$stmt2 = $MySQLi_CON->prepare("SELECT * from user WHERE user_ID = '$user_ID'"); 
	$stmt2->execute(); 
	$result2= $stmt2->fetchAll();
	foreach( $result2 as $row2) {
    	
		$uname= $row2["user_Name"];
		$uemail= $row2["email"];
		$umobile= $row2["mobile"];
	}	

$paypal_link = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypal_username = $paypal; //Business Email

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Payment Receipt</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
    margin-top: 100px;
}
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong><?php echo $ename?></strong>
                        <br></br>
                        <abbr title="Phone">Phone :</abbr> <?php echo $emobile?>
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Date: <?php echo $date?></em>
                    </p>
                    <p>
                        <em>Receipt #:  <?php echo $ids?></em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
						   <th>Name</th>
							<th>Client</th>
                            <th>Problem</th>
                            <th>Method</th>
                            <th class="text-center">Fee</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9"><em><?php echo $name?></em></h4></td>
								  <td class="col-md-1" style="text-align: center"><?php echo $uname?></td>
                            <td class="col-md-1" style="text-align: center"><?php echo $problem?></td>
						
                            <td class="col-md-1 text-center"><?php echo $method?></td>
                            <td class="col-md-1 text-center"><?php echo $payment?></td>
							<td class="col-md-1 text-center"><?php echo $payment?></td>
                        </tr>
                        <tr>
                            <td> &nbsp; </td>
                            <td> &nbsp; </td>
							<td> &nbsp; </td>
							    <td> &nbsp; </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal:&nbsp;</strong>
                            </p>
                           </td>
                            <td class="text-center">
                            <p>
                                <strong>RM <?php echo $payment?></strong>
                            </p>
                          </td>
                        </tr>
                        <tr>
                            <td> &nbsp; </td>
                            <td> &nbsp; </td>
							<td> &nbsp; </td>
							<td> &nbsp; </td>
                            <td class="text-right"><h4><strong>Total:&nbsp;</strong></h4></td>
                            <td class="text-center text-danger"><h4><strong>RM<?php echo $payment?></strong></h4></td>
							
                        </tr>
                    </tbody>
                </table>
				<!--
					<form class="paypal" action="payments.php" method="post" id="paypal_form" target="_blank">
		<input type="hidden" name="cmd" value="_xclick" />
		<input type="hidden" name="no_note" value="1" />
		<input type="hidden" name="lc" value="UK" />
		<input type="hidden" name="currency_code" value="GBP" />
		<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
		<input type="hidden" name="first_name" value="Customer's First Name"  />
		<input type="hidden" name="last_name" value="Customer's Last Name"  />
		<input type="hidden" name="payer_email" value="customer@example.com"  />
		<input type="hidden" name="item_number" value="123456" / >
		<input type="hidden" name="order" value="<?php echo $row['order_ID']; ?>">
		<input type="submit" class="btn btn-info btn-lg btn-block" name="submit" value="Pay Now"/>
		 <a href="order.php"<button type="button" class="btn btn-success btn-lg btn-block">
                    Go back</button></a></td>
	</form>-->
	
		<?php
		//fetch products from the database
		$results = ("SELECT * FROM PRODUCT WHERE order_ID LIKE '$ids'");
		$stmt = $MySQLi_CON->prepare($results);
		$stmt->execute();
		$products = $stmt->fetchAll();
		foreach ($products as $row) {
	?>
    <form method="post" name="paypal" action="<?php echo $paypal_link; ?>">

        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="<?php echo $paypal_username; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="<?php echo $row['name']; ?>">
        <input type="hidden" name="item_number" value="<?php echo $row['order_ID']; ?>">
        <input type="hidden" name="amount" value="<?php echo $row['payment']; ?>">
	

        <input type="hidden" name="currency_code" value="MYR">
        
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='http://localhost/fyp2/paypal_cancel.php'>
		<input type='hidden' name='return' value='http://localhost/fyp2/paypal_success.php'>

        
        <!-- Display the payment button. -->
        <input type="submit" class="btn btn-info btn-lg btn-block" name="submit" value="Pay" border="0">
    
    </form>
    <?php } 
	
$_SESSION['code'] ='MYR';
$_SESSION['number'] = $ids;
$_SESSION['amt'] = $payment;

	
?>		
	
	

            </div>
        </div>
    </div>
<script type="text/javascript">

</script>
</body>
</html>

