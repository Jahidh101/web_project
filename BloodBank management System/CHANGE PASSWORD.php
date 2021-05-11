<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="js/regValidate.js"></script>
</head>
<body>

<?php 
require_once ("controller/change password.php");

if (isset($_SESSION['uname'])) {

	  echo '<div class="" >';
	  echo '<form method= "post"';
	  echo '<b>CHANGE PASSWORD </b><br><br>';
    echo '<span style ="color:red"';
     if(isset($error))  
        {      
          echo '<span style ="color:red">';
          echo $error; 
          echo '</span>';
 
        }  
    echo '</span>';
    echo '<br><br><form method="post" >';
      echo '<label class = "formLabel">Current Password : </label>';
      echo '<input type="Password" id = "currPass" name="currentPassword" onkeyup = "checkCurrPassword()" onblur = "checkCurrPassword()"><span id = "currPassErr"></span><br><br>';
      echo '<label class = "formLabel">New Password : </label>';
      echo '<input type="Password" id = "password" name="newPassword" onkeyup = "checkPassword()" onblur="checkPassword()"><span id = "passErr"></span><br><br>';
      echo '<label class = "formLabel">Retype New Password : </label>';
      echo '<input type="Password" id = "confirmPassword" name="reNewPassword" onkeyup = "checkConPassword()" onblur = "checkConPassword()"><span id = "conPassErr"></span><br><br>';
      echo '<br>';
      echo '<span class = "formSubmit"><input type="submit" value="Submit" name="submit"> </span><br>';
      if(isset($message))  
                     {  
                          echo $message;  
                     }  
    echo '</form>';
	  echo '</div>';
	

}
else{
		$msg="error";
		header("location:login.php");
		// echo "<script>location.href='login.php'</script>";
	}

 ?>
</span>
<?php include 'footer.php';?>

</body>
</html>

