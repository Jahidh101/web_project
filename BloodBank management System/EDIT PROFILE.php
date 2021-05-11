<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="js/regValidate.js"></script>
</head>
<body>

<?php 
require_once ("controller/edit profile.php");
require_once 'model/model.php';
include 'header.php';


if (isset($_SESSION['uname'])) {
	  echo '<div class="" >';
	  echo '<form method= "post"';
	   echo '<b>EDIT PROFILE </b><br><br>';

	     echo '<label class = "formLabel" >Hospital Name : </label>'; 
       echo ' <input type="text" id = "hname" name="hname" onkeyup = "checkHname()" onblur="checkHname()" value= "';
       echo getHname($_SESSION['uname']);	  
       echo  '">';
       if (isset($hnameErr)) {
               echo '<span>'. $hnameErr . '</span>';
       }

       echo '<span id="hnameErr"></span><br><br>';

       echo '<label class = "formLabel" >Phone : </label> '; 
       echo ' <input type="text" id = "phone" name="phone" onkeyup ="checkPhone()" onblur = "checkPhone()" value= "';
       echo getHphone($_SESSION['uname']);	  
       echo  '">';
       if (isset($phoneErr)) {
               echo $phoneErr;
       }
       echo '<span id="phoneErr"></span><br><br>';

       echo '<label class = "formLabel">Email : </label> '; 
       echo ' <input type="text" id = "email" name="email" onkeyup = "checkEmail()" onblur="checkEmail()" value= "';
       echo getHemail($_SESSION['uname']);	  
       echo  '">';
       if (isset($emailErr)) {
               echo $emailErr;
       }
       echo '<span id="emailErr"></span><br><br>';

       echo '<label class = "formLabel">Address : </label> '; 
       echo ' <input type="text" id = "address" name="address" onkeyup= "checkAddress()" onblur = "checkAddress()" value= "';
       echo getHaddress($_SESSION['uname']);	  
       echo '">';
       if (isset($addressErr)) {
               echo $addressErr;
       }
       echo '<span id="addressErr"></span><br><br>';

	     
	     echo '<span class = formSubmit> <input type="submit" name="submit" value="Submit"></span>';
	     echo '</form>';
            if (isset($msg)) {
               echo $msg;
            }
       
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

