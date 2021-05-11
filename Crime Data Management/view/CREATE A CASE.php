
<?php 
require_once ("../controller/create a case.php");
include 'header.php';

if (isset($_SESSION['policeID']) || isset($_SESSION['id'])) {
       include 'create a case 2.php';  
}
else{
    $msg="error";
    header("location:login.php");
  }

?>


