<?php
include('../libs/bootstrap.php');
$doctorInfo = dauth();
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
		 id="datepicker11"  style="width:90px; cursor: pointer; color: #f00; font-size: 16px;"	 value="انتخاب تاریخ"/ onchange="showdate(this.value)">
		 <label class="title"> : تاریخ های رزرو</label> 
		</div>
		<div id="b">
		 <input class="input"  readonly="readonly"  title="برای انتخاب تاریخ کلیک کنید" type="text"
		 id="datepicker11"  style="width:90px; cursor: pointer; color: #f00; font-size: 16px;"	 value="انتخاب تاریخ"/ onchange="showdate(this.value)">
		 <label class="title"> : تاریخ های رزرو</label> 
		</div>
 		<div class="doctor_main">
		 <div class="right_panel">
		 	<img alt="" src="../images/cartable2.png"><br>
		 	<b class="title">امروز:<?php echo date::jdate('j F Y'); ?>  </b>
		 	<hr>
		 	<table>
		 	<tr>
		 	<td><b class="title"><?=$doctorInfo['name']?></b></td>
		 	<td><img class="image" src="../images/doctor/<?=$doctorInfo['img']?>" width="85px" height="113px;"></td>
		 	</tr>
		 	</table>
		 	<br>
		 	<div class="menu"  onclick="dvisit_time()">مشاهده وقت های رزرو شده</div>
		 	<div class="menu"  onclick="reserve()">تعریف روزهای فعال</div>
		 	<div class="menu" onclick="profile()">ویرایش اطلاعات</div>
		 	<a href="index.php?exit=true"><div class="menu" >خروج</div></a>
		 </div>
		  <div id="main_panel"  class="main_panel">
		 <b class="title" style="font-size: 25px; color: #f00;">اخبار و اطلاعیه ها</b>
		 <hr>
		 <?php
		$news=$database->getRows("SELECT * FROM news ORDER BY `date` DESC,`id` DESC LIMIT 0,4");
	  	foreach ($news as $row){
		?>
		<a href="#" onclick="news('<?=$row['id']; ?>');">
		<div class="news">
		<table align="right">
		<tr>
		<td>
		<b style=" font-size: 18px;"><?=$row['title']; ?></b><br>
		<b style=" font-size: 14px;"><?=$row['date']; ?></b>
		<p dir="rtl" style="font-size: 13px;margin-top: -5px; "><?=limitword($row['body'], 10) ?> (مشاهده کامل خبر) ... </p>
		</td>
		<td>
		<img class="image" src="images/news/<?=$row['image']?>" width="60" height="60" style="border:1px solid #ccc;">
		</td>
		</tr>
		</table>
		</div>
		</a>
		<?php
	  }
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