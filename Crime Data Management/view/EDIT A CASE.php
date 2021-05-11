
<?php 
require_once ("../controller/edit a case.php");
include 'header.php';

if (isset($_SESSION['policeID']) || isset($_SESSION['id'])) {
       include 'edit a case 2.php';  
}
else{
    $msg="error";
    header("location:login.php");
  }

?>


