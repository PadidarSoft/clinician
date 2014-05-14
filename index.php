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
<script type="text/javascript" src="jquery/chkint.js"></script>
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
					   			<td align="right"><div style='color:#F00; '><?php echo $_SESSION['pateint_error'] ?></div></td>
					   			</tr>
							</table>
					
					  </div>
					</form>
				
				</div>
				</div>
		</div>	
				
	<?php	
	break;
	
	case 'register':
		if(isset($_POST['register'])){
			if(!empty($_POST['name']) && !empty($_POST['uername']) 
			&& !empty($_POST['password']) && !empty($_POST['melicode'])
			&& !empty($_POST['age']) && !empty($_POST['insurance']) 
			&& !empty($_POST['mobile']) && !empty($_POST['security_code'])){
				$name=$_POST['name'];
				$chkusername=$_POST['username'];
				$countrow = $database->getCountRow("SELECT * FROM pateint WHERE username =?", array($chkusername));
				if($countrow<1){
					$username=$_POST['username'];
				}else{
					die ("<SCRIPT LANGUAGE='JavaScript'>window.alert('نام کاربری انتخاب شده وجود دارد');
							window.history.back();
							</SCRIPT>");
				}
				$password=__md5($_POST['password']);
				$melicode=$_POST['melicode'];
				$gender=$_POST['gender'];
				$age=$_POST['age'];
				$mobile=$_POST['mobile'];
				$insurance=$_POST['insurance'];
				if(!empty($_POST['email'])){
					if(filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL)){
						$email=$_POST['email'];
					}else{
						die ("<SCRIPT LANGUAGE='JavaScript'>
	    						window.alert('فرمت ارسالی ایمیل صحیح نمی باشد');
								window.history.back();
								</SCRIPT>");
					}
				
				}else{
					$email="";
				}
				$address=strip_tags($_POST['address']);
				$allowed_filetypes = array('.jpg','.gif','.bmp','.png');
				$max_filesize = 524288;
				$upload_path = 'images/pic/';
				$filename = $_FILES['img']['name'];
				if(!empty($filename)){
					$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1);
				
					if(!in_array($ext,$allowed_filetypes))
					{
						die ("<SCRIPT LANGUAGE='JavaScript'>
				    						window.alert(' فرمت فایل انتخابی مناسب نمی باشد')
											window.history.back();
											</SCRIPT>");
					}
				
					if(filesize($_FILES['img']['tmp_name']) > $max_filesize)
					{
						die ("<SCRIPT LANGUAGE='JavaScript'>
				    						window.alert(' حجم فایل انتخابی زیاد می باشد(حداکثر 500 کیلوبایت)')
											window.history.back();
											</SCRIPT>");
					}
					$random=rand(1000, 10000);
					$tname=$random.$filename;
				
					move_uploaded_file($_FILES['img']['tmp_name'],$upload_path . $tname);
					$sname=$random.$filename;
				}else{
					$sname='none.png';
				}
				
				$security_code=$_POST['security_code'];
				if(isset($_POST["security_code"])&&$_POST["security_code"]!=""&&$_SESSION["code"]==$_POST["security_code"]){
					$insertrow = $database ->insertRow("INSERT INTO pateint
							(name,username,password,insurance_id,melicode,gender,age,pic,email,mobile,address) VALUES (?,?,?,?,?,?,?,?,?,?,?)"
							, array($name,$username,$password,$insurance,$melicode,$gender,$age,$sname,$email,$mobile,$address));
							print("<div align='center' class='box-message'>ثبت نام با موفقیت انجام گردید</div> ");
				
				}else{
							echo ("<SCRIPT LANGUAGE='JavaScript'>
				    						window.alert('کد امنیتی وارد شده اشتباه می باشد');
											window.history.back();
											</SCRIPT>");
				}
						
			}else{
				echo ("<SCRIPT LANGUAGE='JavaScript'>
    						window.alert('لطفا فیلد های ستاره دار را پر نمایید');
							window.history.back();
							</SCRIPT>");
			}
		}
	?>
	
		<div style="width: 800px; display: block;    margin-left: auto;    margin-right: auto; margin-top: -17px;">
			<div class="main_register" align="right">
			<a href="index.php?page=login">
				<div align="center" class="button"  style="margin-left: 15px;margin-top: 10px;">ورود به سیستم</div>
			</a>
				<div style="margin-top: -10px;margin-right: 10px;">
				<form action="index.php?page=register"  enctype="multipart/form-data" method="post">
				
				<table style="width: 720px; float: right;" dir="rtl">
				
				<tr style="height: 60px;">
					<td align="left"><label class="text">* نام و نام خانوادگی </label></td>
					<td><input id="name" name="name"  class="input" type="text" style="width: 220px;" onblur="CheckEmpty();">
					<div id="n" class="error"></div>
					</td>
				</tr>
				
				<tr>
					<td style="height: 30px;" align="left"><label class="text" >* نام کاربری</label></td>
					<td><input id="user"  name="username" class="input" type="text" placeholder="مثال: test"  onblur="CheckEmpty();">
					<div id="u" class="error"></div>
					</td>
					<td align="left"><label class="text">* کلمه عبور</label></td>
					<td><input id="pass"  name="password" class="input" type="password" onblur="CheckEmpty();">
					<div id="p" class="error"></div>
					</td>
				</tr>
				
				<tr>
					<td style="height: 60px;" align="left"><label class="text">* کد ملی</label></td>
					<td>
					<input id="melicode"  name="melicode" maxlength="10" class="input" type="text" placeholder="مثال: 0780123456"  onblur="CheckEmpty();" onKeyUp="numericFilter(this);">
					<div id="mc" class="error"></div>	 
					</td>
					
					<td align="left" ><label class="text">* جنسیت</label></td>
					<td style="width: 60px;">
					<table style="width: 205px;">
					<tr>
						<td>
						<select id="gender"  name="gender" class="input" style="height: 34px;" >
						<option value="male">مرد</option>
						<option value="female">زن</option>
						</select>
						</td>
						<td align="left" ><label class="text">* سن</label></td>
						<td align="right" >
						<input id="age" name="age"  class="input" type="text" style="width: 40px;" maxlength="3" onKeyUp="numericFilter(this);" onblur="CheckEmpty();">
						<div id="a" class="error" ></div>
						</td>
					</tr>
					</table>
					</td>
				</tr>
				
				 <tr>
                      <td align="left" valign="top"><label class="text">تصوير: </label></td>
                      <td>
                      <input class="custom-file-input"  type="file" name="img">
                      <div class="error">فرمت قابل قبول:jpg</div>
                      </td>
                      <td align="left" ><label class="text">* نوع بیمه</label></td>                 
                      <td>
                      <select id="insurance" name="insurance"  class="input" style="height: 34px; width: 120px;" >
                      <?php 
                      $getrows = $database->getRows("SELECT * FROM insurance");
                      foreach ($getrows as $row) {
                      ?>
					  <option value="<?=$row['id']?>"><?=$row['cname'] ?></option>
					  <?php 
					  }
					  ?>
					  </select>
                      </td>
                 </tr>
                 
				<tr>
					<td style="height: 20px;" align="left"><label class="text">* تلفن تماس</label></td>
					<td>
					<input id="mobile"  name="mobile" maxlength="11"   class="input" type="text" placeholder="مثال: 09151234567"  onblur="CheckEmpty();" onKeyUp="numericFilter(this);">
					<div id="m" class="error" ></div>					
					</td>
					<td align="left"><label class="text">ایمیل</label></td>
					<td><input id="email"  name="email"  class="input" type="text" placeholder="مثال: test@test.com"></td>
				</tr>
				
				<tr>
					<td style="height: 110px;" align="left"><label class="text"> آدرس</label></td>
					<td><textarea id="address" name="address" class="input"  style="width: 300px; height: 70px;" onkeypress="return imposeMaxLength(this, 150);"  onblur="CheckEmpty();"></textarea></td>
					<td></td>
				</tr>
				
				<tr >
					<td valign="middle"  align="left">
					<label class="text">کد امنیتی</label>
					</td>
					<td valign="middle">
		        	<input id="security_code" class="input"  name="security_code" size="9"  style="font-family: tahoma; font-size: 15px;" type="text" onkeyup="numericFilter(this);" maxlength="4" autocomplete="off" />
					</td>
					<td align="right"><img style="margin-right: -207px; margin-top: 6px;  border-radius:5px;"  src="CaptchaSecurityImages.php" /></td>
				</tr>
				
				<tr>
					<td></td>
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