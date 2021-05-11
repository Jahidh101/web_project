<?php  

session_start();
require_once '../model/model.php';
$ACaseInfo = getACaseInfo($_GET['CaseNumber']);

 $message = '';  
 if(isset($_POST["yes"]))  
 { 
    if(getExistingRequest($ACaseInfo['CaseNumber'], $_SESSION['policeID']) != 1) {
    	if (insertPermissionRequest($ACaseInfo['CaseNumber'], $_SESSION['policeID'])) {
    		$message = 'Request successfully sent!!';
    	}
    }else{
    	$message = "Request already exists";
    }
 } 
 else if(isset($_POST["no"]))  
 { 
    header("location:OTHER CASES_police.php");
 }  

 ?>  