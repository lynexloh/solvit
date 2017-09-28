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
$ids = $_GET['ids'];

?>