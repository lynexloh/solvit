<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
try{
    $pdo = new PDO("mysql:host=localhost;dbname=bit302Ass", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $e){
	die("ERROR: Could not connect. " . $e->getMessage());
}
 
// Attempt search query execution
try{
    if(!empty($_GET['q'])){
		$q = $_GET['q'];

        // create prepared statement
        $sql = "SELECT * FROM user WHERE user_Name LIKE '%$q%'";
        $stmt = $pdo->prepare($sql);
        // bind parameters to statement
        // execute the prepared statement
        $stmt->execute();
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()){
                echo "<p>" . $row['user_Name'] . "</p>";
				$ids =  $row['user_ID'];
            }
        }
		else{
			echo "<p>No matches found";
        }
    }  
}
catch(PDOException $e){
	die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Close connection
unset($pdo);
?>