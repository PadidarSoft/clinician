<?php
define('AUTH_HASH','evesho sere chand?');
function __md5($str,$random = false){
	if($random){
		return md5($str . microtime() . rand());
	}
	return md5($str . AUTH_HASH);
}

function auth(){
	global $mysql;
	if(!isset($_SESSION['login_id'])){
		header('Location: ../sitem/index.php');
		exit();
	}
	$result = $mysql->query("SELECT * FROM manager WHERE id = '{$_SESSION['login_id']}'");
	if(mysql_num_rows($result) < 1){
		header('Location: ../sitem/index.php');
		exit();
	}
	$userInfo = mysql_fetch_array($result);
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


function logout(){
	unset($_SESSION['login_id']);
	unset($_SESSION['error']);
	return true;
}
?>