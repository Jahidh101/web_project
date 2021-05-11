<?php  

session_start();
require_once '../model/model.php';
$ARequest = getARequest($_GET['ID']);
 $message = '';
 $conn = '';  
 if($_GET['Action'] == '1')  
 { 
 	$conn = updatePermissionRequest($ARequest['ID'], 'a');
    if(getExistingExternal($ARequest['CaseNumber'], $ARequest['Police_ID']) != 1) {
    	if (insertExternalPolice($ARequest['CaseNumber'], $ARequest['Police_ID'])) {
    		header("location:../view/PENDING CASE REQUESTS.php");
    	}
    }
 }  
 if($_GET['Action'] == '2')  
 { 
 	$conn = updatePermissionRequest($ARequest['ID'], 'r');
 	header("location:../view/PENDING CASE REQUESTS.php");
 }  
 if($_GET['Action'] == '3')  
 { 
 	if (deletePermissionRequest($ARequest['ID'])) {
 	 	header("location:../view/SHOW ALL CASE REQUESTS.php");
 	}
 }  


 ?>  