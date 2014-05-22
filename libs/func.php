<?php
define('AUTH_HASH','evesho sere chand?');

function __md5($str,$random = false){
	if($random){
		return md5($str . microtime() . rand());
	}
	return md5($str . AUTH_HASH);
}

function pauth(){
	$database = new db("root", "", "localhost", "clinician", array(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf-8'"));
	if(!isset($_SESSION['pateint_id'])){
		header('Location: index.php?page=login');
		exit();
	}
	$countuser = $database->getCountRow("SELECT * FROM pateint WHERE id =? ", array($_SESSION['pateint_id']));
	if($countuser<1){
		header('Location: index.php?page=login');
		exit();
	}
	$userInfo = $database->getRow("SELECT * FROM pateint WHERE id =?", array($_SESSION['pateint_id']));
	return $userInfo;
}

function pateint_logout(){
	unset($_SESSION['pateint_id']);
	unset($_SESSION['pateint_error']);
	return true;
}
?>