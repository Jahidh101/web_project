
<?php 
session_start();
include 'header.php';

if (isset($_SESSION['policeID'])) {
       include 'external case list_police 2.php';  
}
else{
    $msg="error";
    header("location:login.php");
  }

?>


