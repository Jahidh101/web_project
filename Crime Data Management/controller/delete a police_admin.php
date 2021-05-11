<?php  

session_start();
require_once '../model/model.php';
$police = getAPolice($_GET['NID']);
$name = $police["Name"];
$id = $police["Police_ID"];
$conn = '';

 $message = '';  
 if(isset($_POST["yes"]))  
 { 
    $name = $police["Name"];
    $id = $police["Police_ID"];
    $conn = deleteACasePolice($police["Police_ID"]);
        if(deleteAPolice($_GET['NID'])) {
          $message = 'Successfully deleted!!';
        }
 }  

 ?>  