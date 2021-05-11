
<?php 
session_start();
include 'header.php';

if (isset($_SESSION['policeID']) || isset($_SESSION['id'])) {
       include 'my case list_police 2.php';  
}
else{
    $msg="error";
    header("location:login.php");
  }

?>


