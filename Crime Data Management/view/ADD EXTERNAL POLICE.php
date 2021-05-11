
<?php 
require_once ("../controller/add external police.php");
include 'header.php';


if (isset($_SESSION['policeID']) || isset($_SESSION['id'])) {
	echo '<!DOCTYPE html>
	<html>
	<head>
	    <link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
	<h3>Add a external police to Case Number :' . $ACaseInfo["CaseNumber"]. ' </h3>
	<form method = "post" align = "center">
	<span id=""><b>Enter police ID :</b> </span><br><br>
	<input class="textBox1" type="text" name="policeID" placeholder="Enter police ID"><br><br>
	<input type = "submit" name = "add" id= "submit" value = "ADD"></input><br><br>';
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


