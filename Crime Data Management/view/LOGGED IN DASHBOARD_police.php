<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php 
session_start();
include 'header.php';?>
<?php 

if (isset($_SESSION['policeID'])) {
	  echo '<div class="body" >';
	  echo "<h2> Welcome ".$_SESSION['policeID']."</h2>";
	  echo '</div>';
}else{
		$msg="error";
		header("location:LOGIN.php");
	}

 ?>
</span>

</body>
</html>

