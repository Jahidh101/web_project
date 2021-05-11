
<?php 
session_start();
require_once ("../model/model.php");
include 'header.php';

if (isset($_SESSION['policeID'])) {
       include 'view profile_police 2.php';  
}
else{
    $msg="error";
    header("location:login.php");
  }

?>


