
<?php 
session_start();
include 'header.php';

if (isset($_SESSION['policeID'])) {
       include 'other cases_police 2.php';  
}
else{
    $msg="error";
    header("location:login.php");
  }

?>


