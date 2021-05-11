
<?php 
require_once ("../controller/edit profile_police.php");
include 'header.php';

if (isset($_SESSION['policeID'])) {
       include 'edit profile_police 2.php';  
}
else{
    $msg="error";
    header("location:login.php");
  }

?>


