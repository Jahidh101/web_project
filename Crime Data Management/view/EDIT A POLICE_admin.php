
<?php 
require_once ("../controller/edit a police_admin.php");
include 'header.php';

if (isset($_SESSION['id'])) {
       include 'edit a police_admin 2.php';  
}
else{
    $msg="error";
    header("location:login.php");
  }

?>


