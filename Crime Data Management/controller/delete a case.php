<?php  

session_start();
require_once '../model/model.php';
$ACaseInfo = getACaseInfo($_GET['CaseNumber']);
$caseNumber = $ACaseInfo['CaseNumber'];
$conn = '';

 $message = '';  
 if(isset($_POST["yes"]))  
 { 
    $caseNumber = $ACaseInfo['CaseNumber'];
    $conn = deleteAVictim($ACaseInfo['Victim_ID']);
    $conn = deleteASuspect($ACaseInfo['Suspect_ID']);
    $conn = deleteACriminal($ACaseInfo['Criminal_ID']);
    $conn = deleteACaseAccess($ACaseInfo['CaseNumber']);
    if(deleteACase($ACaseInfo['CaseNumber'])) {
    	$message = 'Successfully deleted!!';
    }
 }  

 else if(isset($_POST["no"]))  
 { 
    header("location:MY CASE LIST_police.php");
 }  

 ?>  