
<?php 
session_start();
include 'header.php';

if (isset($_SESSION['policeID'])) {
       include 'view all case_police 2.php';  
}
else{
    $msg="error";
    header("location:login.php");
  }

?>


