<?php 

session_start();
require_once '../model/model.php';

$id="";
$password="";
$msg = '';
if (isset($_POST['login'])){
	$id = $_POST['id'];
	$password = $_POST['password'];
	if (!isset($_POST['userType'])) {
		$msg = '<span class = "red">Select user type</span>';
	}

	else if (empty($_POST['id'])) {
		$msg = '<span class = "red">ID can not be empty</span>';
	}

	else if (empty($_POST['password'])) {
		$msg = '<span class = "red">Password can not be empty</span>';
	}

	else if ($_POST['userType'] == 'admin') {
		$rowCount = adminLogin($id, $password);
		if ($rowCount == 1) {
			$_SESSION['id'] = $id;  
			header("location:LOGGED IN DASHBOARD.php");
		}else{
			$msg = '<span class = "red">Incorrect ID or Password</span>';
		}
	}

	else if ($_POST['userType'] == 'police') {
		$rowCount = policeLogin($id, $password);
		if ($rowCount == 1) {
			$_SESSION['policeID'] = $id;  
			header("location:LOGGED IN DASHBOARD_police.php");
		}else{
			$msg = '<span class = "red">Incorrect ID or Password1</span>';
		}
	}

	
	
}
// if (isset($_POST['uname'])) {
// 	if ($_POST['uname']==$uname && $_POST['password']==$password) {
// 		$_SESSION['uname'] = $uname;  
// 		$_SESSION['password'] = $password;
		
// 		if (!isset($_SESSION['email'])){
// 	     	$_SESSION['email'] = $email;
// 	     }
// 	     if (!isset($_SESSION['phone'])){
// 	     	$_SESSION['phone'] = $phone;
// 	     }
// 	     if (!isset($_SESSION['hname'])){
// 	     	$_SESSION['hname'] = $hname;
// 	     }
// 	     if (!isset($_SESSION['address'])){
// 	     	$_SESSION['address'] = $address;
// 	     }
// 	     header("location:LOGGED IN DASHBOARD.php");
// 	}
// 	else{
// 		$msg="username or password invalid";
// 	}

// }

?>