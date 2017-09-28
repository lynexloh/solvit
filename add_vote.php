
<?php
/*
if(!empty($_POST["id"])) {
	require_once("connection.php");
	$query = "INSERT INTO ipaddress_vote_map (ip_address,link_id,vote_rank) VALUES ('" . $_SERVER['REMOTE_ADDR'] . "','" . $_POST["id"] . "','" . $_POST["vote_rank"] . "')";
	  $result = $MySQLi_CON->prepare($query);
		$result->execute();

	if(!empty($result)) {
		$query = "SELECT SUM(vote_rank) as vote_rank FROM ipaddress_vote_map  WHERE link_id = '" . $_POST["id"] . "' and ip_address = '" . $_SERVER['REMOTE_ADDR'] . "'";
		$row = $MySQLi_CON->query($query);
		$results = $row->fetch(PDO::FETCH_ASSOC);  
		
		switch($_POST["vote_rank"]) {
			case "1":
				$update_query ="UPDATE links SET votes = votes+1 WHERE id='" . $_POST["id"] . "'";
			break;
			case "-1":
				$update_query ="UPDATE links SET votes = votes-1 WHERE id='" . $_POST["id"] . "'";
			break;
		}
		$result = $MySQLi_CON->prepare($update_query);
		 $count = $result->execute();
			print $results[0]["vote_rank"];

	}
}
*/

	require_once("dbcontroller.php");

	$db_handle = new DBController();
		
if(!empty($_POST["id"])) {
	$query = "INSERT INTO ipaddress_vote_map (ip_address,link_id,vote_rank) VALUES ('" . $_SERVER['REMOTE_ADDR'] . "','" . $_POST["id"] . "','" . $_POST["vote_rank"] . "')";
	$result = $db_handle->insertQuery($query);
	if(!empty($result)) {
		$query = "SELECT SUM(vote_rank) as vote_rank FROM ipaddress_vote_map  WHERE link_id = '" . $_POST["id"] . "' and ip_address = '" . $_SERVER['REMOTE_ADDR'] . "'";
		$row = $db_handle->runQuery($query);
	
	
		switch($_POST["vote_rank"]) {
			case "1":
				$update_query ="UPDATE links SET votes = votes+1 WHERE id='" . $_POST["id"] . "'";
				//$update_query ="UPDATE links t1 INNER JOIN user t2 on (t1.user_ID = t2.user_ID) SET t1.votes = t1.votes+1,t1.votes = t2.votes+2 WHERE t1.id='" . $_POST["id"] . "' and t2.user_ID='" . $_POST["user_ID"] . "'";

				
				//$update_query ="UPDATE user SET points = points+1 WHERE user_ID='$user'";
			break;
			case "-1":
				$update_query ="UPDATE links SET votes = votes-1 WHERE id='" . $_POST["id"] . "'";
				//$update_query ="UPDATE user SET points = points-1 WHERE user_ID='$user'";
			break;
		}
		
		$result = $db_handle->updateQuery($update_query);	
		print $row[0]["vote_rank"];
	}
}

?>
