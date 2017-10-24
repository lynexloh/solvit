<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "bit302Assignment";
	
	function __construct() {
		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->selectDB($conn);
		}
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function selectDB($conn) {
		mysqli_select_db($conn,$this->database);
	}
	
	function runQuery($query){
		$result = mysqli_query(mysqli_connect($this->host,$this->user,$this->password,$this->database), $query);
		return $result;
	}
	
	function numRows($query) {
		$result  = mysqli_query($query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
	
	function updateQuery($query) {
		$result = mysqli_query($query);
		if (!$result) {
			die('Invalid query: ' . mysqli_error());
		} else {
			return $result;
		}
	}
	
	function insertQuery($query) {
		$result = mysqli_query($query);
		if (!$result) {
			die('Invalid query: ' . mysqli_error());
		} else {
			return $result;
		}
	}
	
	function deleteQuery($query) {
		$result = mysqli_query($query);
		if (!$result) {
			die('Invalid query: ' . mysqli_error());
		} else {
			return $result;
		}
	}
}
?>