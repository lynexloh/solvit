<?php
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();
include("connection.php");
$id = $_SESSION['userSession'];
$status = "Offline";
$sql = "UPDATE user SET status=:status WHERE user_ID=:id";
$stmt = $MySQLi_CON->prepare($sql);
$stmt->bindValue(":status", $status, PDO::PARAM_STR);
$stmt->bindValue(":id",$id , PDO::PARAM_STR);
$stmt->execute();

// Unset all of the session variables.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_unset();	
// Finally, destroy the session.
session_destroy();
unset($_SESSION["checkLogin"]); 
echo '<script language = "javascript">';
          echo 'alert("You Have Logged Out")';
          echo '</script>';
echo  "<script> window.location.assign('index.php'); </script>";

?>