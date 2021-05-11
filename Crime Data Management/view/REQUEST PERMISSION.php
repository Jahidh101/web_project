
<?php 
require_once ("../controller/request permission.php");
include 'header.php';


if (isset($_SESSION['policeID']) || isset($_SESSION['id'])) {
	echo '<!DOCTYPE html>
	<html>
	<head>
	    <link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
	
	<form method = "post" align = "center">
	<h3>Are you want to request permission to admin to edit Case Number :' . $ACaseInfo["CaseNumber"]. ' </h3>
	<input type = "submit" name = "yes" id= "submit" value = "YES"></input>
	<input type = "submit" name = "no" id= "reset" value = "NO"></input><br><br>';
	if (isset($message)) {
		echo $message;
	}
	
	echo '</form>
	</body>
	</html>';       
}
else{
    $msg="error";
    header("location:login.php");
}

?>


