<?php 

session_start();

if (isset($_SESSION['id'])) {
	session_destroy();
	header("location:LOGIN.php");
	
}

else if (isset($_SESSION['policeID'])) {
	session_destroy();
	header("location:LOGIN.php");
	
}

else{
	header("location:LOGIN.php");
}

 ?>