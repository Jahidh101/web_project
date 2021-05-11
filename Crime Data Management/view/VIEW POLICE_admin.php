
<?php 
session_start();
include 'header.php';

if (isset($_SESSION['id'])) {
       include 'police list.php';  
}
else{
    $msg="error";
    header("location:login.php");
  }

?>


