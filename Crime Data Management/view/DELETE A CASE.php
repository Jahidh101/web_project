
<?php 
require_once ("../controller/delete a case.php");
include 'header.php';


if (isset($_SESSION['policeID']) || isset($_SESSION['id'])) {
	echo '<!DOCTYPE html>
	<html>
	<head>
	    <link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
	<h3>Are you want to delete Case No : ' . $caseNumber. '? </h3>
	<form method = "post">
	<input type = "submit" name = "yes" id= "submit" value = "YES"></input>
	<input type = "submit" name = "no" id= "reset" value = "NO"></input>
	</form>';
	if (isset($message)) {
		echo $message;
	}
	echo '</body>
	</html>';       
}
else{
    $msg="error";
    header("location:login.php");
  }

?>


