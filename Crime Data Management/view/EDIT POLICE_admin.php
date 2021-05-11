
<?php 
session_start();
include 'header.php';

if (isset($_SESSION['id'])) {
       include 'edit police_admin 2.php';  
}
else{
    $msg="error";
    header("location:login.php");
  }

?>


