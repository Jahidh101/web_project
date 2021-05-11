
<?php 
require_once ("../controller/add police.php");
include 'header.php';

if (isset($_SESSION['id'])) {
       include 'add police 2.php';  
}
else{
    $msg="error";
    header("location:login.php");
  }

?>


