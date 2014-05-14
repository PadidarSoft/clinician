<?php
include 'libs/bootstrap.php';
if(!empty($_POST['username']) && !empty($_POST['password'])){
	$username=$_POST['username'];
	$password=__md5($_POST['password']);
	$countuser = $database->getCountRow("SELECT * FROM pateint WHERE username =? and password=?", array($username,$password));
	if($countuser<1){
		$_SESSION['pateint_error'] = 'نام کاربری و یا کلمه عبور اشتباه می باشد';
		header("Location:index.php?page=login");
		exit();
	}
		$selectuser = $database->getRow("SELECT * FROM pateint WHERE username =? and password=?", array($username,$password));
		$_SESSION["pateint_time"] = time();
		$_SESSION["pateint_id"] = $selectuser['id'];
		$_SESSION['pateint_error'] = '';
		header("Location:personal.php?page=home");
		exit();
	
}else{
		$_SESSION['pateint_error'] = 'لطفا نام کاربری و یا کلمه عبور را وارد نمایید';
		header("Location:index.php?page=login");
		exit();
}