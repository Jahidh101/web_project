<?php  

session_start();
require_once '../model/model.php';
$ACaseInfo = getACaseInfo($_GET['CaseNumber']);

 $message = '';  
 if(isset($_POST["add"]))  
 { 
    if(getExistingExternal($ACaseInfo['CaseNumber'], $_POST['policeID']) != 1) {
    	if (insertExternalPolice($ACaseInfo['CaseNumber'], $_POST['policeID'])) {
    		$message = 'Successfully added!!';
    	}
    }else{
    	$message = "Case number and it's respective policeID already exists";
    }
 }  

 ?>  