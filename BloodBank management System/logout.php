<?php 

session_start();

if (isset($_SESSION['uname'])) {
	session_destroy();
	header("location:LOGIN.php");
	
}

else{
	header("location:LOGIN.php");
}

 ?>