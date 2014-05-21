<?php
define('AUTH_HASH','evesho sere chand?');

function __md5($str,$random = false){
	if($random){
		return md5($str . microtime() . rand());
	}
	return md5($str . AUTH_HASH);
}

function auth(){
	$database = new db("root", "", "localhost", "clinician", array(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf-8'"));
	if(!isset($_SESSION['login_id'])){
		header('Location: ../sitem/index.php');
		exit();
	}
	$info = $database->getCountRow("SELECT * FROM manager WHERE id=?",array($_SESSION['login_id']));
	if($info < 1){
		header('Location: ../sitem/index.php');
		exit();
	}
	$userInfo = $database->getRow("SELECT * FROM manager WHERE id=?",array($_SESSION['login_id']));
	return $userInfo;
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

function createthumb($name,$filename,$new_w,$new_h){
	$src_img=imagecreatefromjpeg($name);
	$old_x=imageSX($src_img);
	$old_y=imageSY($src_img);
	
	if ($old_x > $old_y) {
		$thumb_w=$new_w;
		$thumb_h=$old_y*($new_h/$old_x);
	}
	if ($old_x < $old_y) {
		$thumb_w=$old_x*($new_w/$old_y);
		$thumb_h=$new_h;
	}
	if ($old_x == $old_y) {
		$thumb_w=$new_w;
		$thumb_h=$new_h;
	}
	
	$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
	imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y);

	imagejpeg($dst_img,$filename); 

	imagedestroy($dst_img); 
	imagedestroy($src_img); 
//createthumb('ok.jpg','ok/ok-thumb.jpg',100,100);
	};


function pateint_logout(){
	unset($_SESSION['pateint_id']);
	unset($_SESSION['pateint_error']);
	return true;
}
?>