<?php 
include_once("layout/top_all.php");
unset($_SESSION['admin']);
header('location: '.ADMIN_URL.'login.php');
exit;
?>