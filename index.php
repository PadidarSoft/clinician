<?php
include 'libs/bootstrap.php';

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
if(isset($_GET['exit'])){
	user_logout();
}
if(isset($_SESSION['pateint_id'])){
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
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen">
</head>
<body>
<?php 
switch ($page) {
	case 'login':
?>
		<div style="width: 800px; display: block;    margin-left: auto;    margin-right: auto; margin-top: 80px;">
			<div class="main_login">
			<a href="index.php?page=register">
				<div align="center" class="button"  style="margin-left: 15px;margin-top: 10px;">ثبت نام در سیستم</div>
			</a>
				<div style="margin-top: 60px;margin-right: 50px;">
					<form action='login.php' method='post'>
						<div align='right' class='l-box'>
							 <table style="width: 360px;">
					  			<tr>
					    			<td valign='middle'>&nbsp;</td>
					    			<td valign='middle'><input name='username' type='text' class='input' /></td>
					    			<td valign='middle'>نام کاربری</td>
					   			</tr>
					  			<tr>
						    		<td valign='middle'><input class="btn2"  type='submit' name='submit' id='login' value='ورود' /></td>
						    		<td valign='middle'><input name='password' type='password'  class='input'/></td>
						    		<td valign='middle'>کلمه عبور</td>
					   			</tr>
							</table>
					<div style='color:#F00;'>".$_SESSION['user_error']."</div>
					  </div>
					</form>
				
				</div>
				</div>
		</div>	
				
	<?php	
	break;
	
	case 'register':
	?>
	
		<div style="width: 800px; display: block;    margin-left: auto;    margin-right: auto; margin-top: -17px;">
			<div class="main_register" align="right">
			<a href="index.php?page=login">
				<div align="center" class="button"  style="margin-left: 15px;margin-top: 10px;">ورود به سیستم</div>
			</a>
				<div style="margin-top: -10px;margin-right: 10px;">
				<form action=""  enctype="multipart/form-data">
				
				<table style="width: 700px;" dir="rtl">
				
				<tr style="height: 60px;">
					<td align="left"><label class="text"> نام و نام خانوادگی</label></td>
					<td><input id="name"  class="input" type="text" style="width: 230px;" ></td>
					<td></td>
				</tr>
				
				<tr>
					<td style="height: 30px;" align="left"><label class="text" > نام کاربری</label></td>
					<td><input id="username"  class="input" type="text" placeholder="مثال: test" ></td>
					
					<td align="left"><label class="text"> کلمه عبور</label></td>
					<td><input id="password"  class="input" type="password"></td>
				</tr>
				
				<tr>
					<td style="height: 70px;" align="left"><label class="text"> کد ملی</label></td>
					<td><input id="melicode"  class="input" type="text" placeholder="مثال: 07801234567" ></td>
					
					<td align="left" ><label class="text"> جنسیت</label></td>
					<td style="width: 60px;">
					<table style="width: 205px;">
					<tr>
					<td>
						<select id="gender"  class="input" style="height: 34px;" >
						<option value="male">مرد</option>
						<option value="female">زن</option>
						</select>
						</td>
						<td align="left" ><label class="text"> سن</label></td>
						<td ><input id="age"  class="input" type="text" style="width: 50px;"></td>
						</tr>
						</table>
					</td>
				</tr>
				
				 <tr>
                      <td align="left" valign="top">تصوير: </td>
                       <td>
                       <input class="custom-file-input"  type="file" name="img">
                       <div class="error">فرمت قابل قبول:jpg</div>
                      </td>
                 </tr>
                 
				<tr>
					<td style="height: 30px;" align="left"><label class="text"> تلفن تماس</label></td>
					<td><input id="mobile"  class="input" type="text" placeholder="مثال: 09151234567" ></td>
					
					<td align="left"><label class="text">ایمیل</label></td>
					<td><input id="email"  class="input" type="text" placeholder="مثال: test@test.com"></td>
				</tr>
				<tr>
					<td style="height: 110px;" align="left"><label class="text"> آدرس</label></td>
					<td><textarea id="address" name="address" class="input"  style="width: 300px; height: 80px;"></textarea></td>
					<td></td>
				</tr>
				
				<tr>
					<td> </td>
					<td>
					<input class="btn2"  type="reset"  value="تنظیم مجدد" >
					<input class="btn2"  name="register"  type="submit"  value="ثبت نام" >
					</td>
				</tr>
				
				</table>
				
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