<?php
include '../libs/bootstrap.php';
if(isset($_GET['exit'])){
	admin_logout();
}
if(!isset($_GET['page'])){
	header("location:index.php?page=login");
	exit();
}else{
	array_filter($_GET, 'trim_value');
	$page=($_GET['page']);
	$page=filter_var($page, FILTER_SANITIZE_STRING);
}


function trim_value(&$value)
{
	$value = trim($value);
}
if(isset($_SESSION['login_id'])){
	header('Location: personal.php?page=home');
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="fa">
<title>سیستم رزرواسیون مجتمع پزشکان</title>
<link rel="stylesheet" href="../style/login.css" type="text/css" media="screen">
<script type="text/javascript" src="../js/chkint.js"></script>
</head>
<body>
<?php 
switch ($page) {
	case 'login':
?>
		<div style="width: 630px; display: block;    margin-left: auto;    margin-right: auto; margin-top: 100px;">
			<div id="main_doctor_login" class="main_admin_login">
				<div style="margin-top: 20px;margin-right: 10px;">
					<form action='login.php' method='post'>
						<div align='right' class='l-box'>
							 <table style="width: 390px;">
							 
					  			<tr>
					    			<td><div align="right" id="u" class="error"></div></td>
					    			<td align="right" valign='middle'>
					    			<input name='username' type='text' class='input'  id="user"  onblur="CheckEmpty();"/>
					    			</td>
					    			<td valign='middle'>نام کاربری</td>
					   			</tr>
					   			
					  			<tr>
						    		<td><div align="right" id="p" class="error"></div></td>
						    		<td align="right"  valign='middle'>
						    		<input name='password' type='password'  class='input'  id="pass" onblur="CheckEmpty();"/>
						    		</td>
						    		<td valign='middle'>کلمه عبور</td>
					   			</tr>
					   			
					   			<tr>
						   			<td></td>
						   			<td align="right"><input class="btn2"  type='submit' name='submit' id='login' value='ورود' /></td>
						   			<td></td>
					   			</tr>
					   			
					   			<tr>
						   			<td></td>
						   			<td align="right">
						   			<div style='color:#F00; '>
						   			<?php
						   			if(isset($_SESSION['login_error'])){
						   			 	echo $_SESSION['login_error'];
						   			}else{
										$_SESSION['login_error']="";
									}
						   			 ?></div></td>
					   			</tr>
					   			
							</table>
					
					  </div>
					</form>
				
				</div>
		</div>	
		</div>		
	<?php	
	break;
	
	default:
	?>	
	
	<div style="width: 800px; display: block;    margin-left: auto;    margin-right: auto; margin-top: 80px;">
		<div class="main_404" align="right">
		<p style="padding-right:10px;" align="right">
		 <img src="images/404.png"/>
		 </p>
		 </div>
	</div>	 
	
	<?php
	break;
	}
	?>

</body>
</html>