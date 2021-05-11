
<?php 
session_start();
include 'header.php';

if (isset($_SESSION['id'])) {
       include 'show all case requests 2.php';  
}
else{
    $msg="error";
    header("location:login.php");
  }

?>


