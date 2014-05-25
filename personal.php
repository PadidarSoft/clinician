<?php
include('libs/bootstrap.php');
$userInfo = pauth();
?>

<!DOCTYPE html>
<html>
<?php
 include("header.php");
?>
 <body>
 <div align="center" style="width: 1024px; margin-left: auto; margin-right: auto;">
		<div id="a">
		 <input class="input"  readonly="readonly"  title="برای انتخاب تاریخ کلیک کنید" type="text"
		 id="datepicker11"  style="width:90px; cursor: pointer; color: #f00; font-size: 16px;"	 value="انتخاب تاریخ"/ onchange="sdate(this.value)">
		 <label class="title"> : تاریخ های رزرو</label> 
		</div>
 		<div class="main">
		 <div class="right_panel">
		 	<img alt="" src="images/cartable.png"><br>
		 	<b class="title">امروز:<?php echo date::jdate('j F Y'); ?>  </b>
		 	<hr>
		 	<table>
		 	<tr>
		 	<td><b class="title"><?=$userInfo['name']?></b></td>
		 	<td><img class="image" src="images/pic/<?=$userInfo['pic']?>" width="85px" height="113px;"></td>
		 	</tr>
		 	</table>
		 	<br>
		 	<div class="menu" style="color: #777; font-size: 16px;" onclick="reserve()">رزرو پزشک</div>
		 	<div class="menu" style="color: #777; font-size: 16px;" onclick="history()">تاریخچه وقت های رزرو شده</div>
		 	<div class="menu" style="color: #777; font-size: 16px;" onclick="profile()">ویرایش اطلاعات</div>
		 	<a href="index.php?exit=true"><div class="menu" style="color: #777; font-size: 16px;">خروج</div></a>
		 </div>
		  <div id="main_panel"  class="main_panel">
		  <?php
		if (isset($_POST['edit'])) {
		if (!empty($_POST['name']) && !empty($_POST['melicode']) &&
		 !empty($_POST['age']) && !empty($_POST['insurance']) &&
		 !empty($_POST['mobile'])){
			$name = $_POST['name'];
			if (empty($_POST['password']) && empty($_POST['oldpassword'])) {
				$password = $userInfo['password'];
			} else {
				$oldpass=$userInfo['password'];
				if (__md5($_POST['oldpassword'])!==$oldpass){
					die ("<SCRIPT LANGUAGE='JavaScript'>
	    					window.alert('کلمه عبور قبلی شما صحیح نمی باشد')
							window.history.back();
							</SCRIPT>");
				}
				$password=__md5($_POST['password']);
				}

			$melicode = $_POST['melicode'];
			$gender = $_POST['gender'];
			$age = $_POST['age'];
			$mobile = $_POST['mobile'];
			$insurance = $_POST['insurance'];
			if (!empty($_POST['email'])) {
				if (filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
					$email = $_POST['email'];
				} else {
					die ("<SCRIPT LANGUAGE='JavaScript'>
	    						window.alert('فرمت ارسالی ایمیل صحیح نمی باشد')
								window.history.back();
								</SCRIPT>");
				}
			} else {
				$email = "";
			}
			$address = strip_tags($_POST['address']);
			$allowed_filetypes = array('.jpg', '.gif', '.bmp', '.png');
			$max_filesize = 524288;
			$upload_path = 'images/pic/';
			$filename = $_FILES['img']['name'];
			if (!empty($filename)) {
				$ext = substr($filename, strpos($filename, '.'), strlen($filename) - 1);
				if (!in_array($ext, $allowed_filetypes)) {
					die ("<SCRIPT LANGUAGE='JavaScript'>
   						window.alert(' فرمت فایل انتخابی مناسب نمی باشد')
						window.history.back();
						</SCRIPT>");
				}

				if (filesize($_FILES['img']['tmp_name']) > $max_filesize) {
					die ("<SCRIPT LANGUAGE='JavaScript'>
   						window.alert(' حجم فایل انتخابی زیاد می باشد(حداکثر 500 کیلوبایت)')
						window.history.back();
						</SCRIPT>");
				}
				$random = rand(1000, 10000);
				$tname = $random . $filename;
				move_uploaded_file($_FILES['img']['tmp_name'], $upload_path . $tname);
				$sname = $random . $filename;
			} else {
				$userpic=$userInfo['pic'];
				if($userpic=='none.png'){
					$sname = 'none.png';
				}else{
					$sname=$userInfo['pic'];
				}
			}

				$updateuser = $database->updateRow("UPDATE  `pateint`
				 SET `name`=?,`password`=?,`insurance_id`=?,
				`melicode`=?,`gender`=?,	`age`=?,`pic`=?,
				`email`=?,`mobile`=?,`address`=? WHERE `id`=?"
				 , array($name,	$password, $insurance,$melicode,
				  $gender, $age, $sname, $email, $mobile, $address,$userInfo['id']));
				  print("<div align='center' class='box-message'>
				  بروزرسانی با موفقیت انجام گرفت</div> ");
		} else {
			echo ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('لطفا فیلد های ستاره دار را پر نمایید')
					window.history.back();
					</SCRIPT>");
		}
	}
		  
		  ?>
		  </div>
	 </div>
 </div>
 </body>
</html>