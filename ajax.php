<?php
include('libs/bootstrap.php');
$userInfo = pauth();

?>
<!DOCTYPE html>
<html>
<?php
include("header.php");
switch ($page) {
	
	case 'home':
		{
			?>
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
		}
	break;

	case 'reserve':
		?>
 	<style>
		#a{
			display: inline-block;
			margin-left: -170px;
			margin-top: 10px;
		}
</style>
 	<b  class="title" style="font-size: 25px; color: #f00;">رزرو پزشک</b><br><hr>
 	<form action="">
 	<table dir="rtl" style="width: 650px; float: right;">
 	<tr>
 		<td align="left"><label class="text">تخصص </label></td>
 		<td align="right">
 		<select name="specialty" class="input"  style="width: 200px;" onchange="
					  showdoctor(this.value)">
 		<option selected="selected">انتخاب کنید...</option>
 		 <?php
		$getrows = $database->getRows("SELECT * FROM specialty");
		foreach ($getrows as $row) { ?>
			 <option value="<?=$row['id']?>"><?=$row['title'] ?></option>
		  <?php
		}

		?>

 		</select>
 		</td>
 	</tr>
 	</table>
 	<div id="txtHint">

 	</div>
	<table>
	<tr>
 	 	<td align="left"></td>
 		<td align="right">
		<div id="visit_time"></div>
 		</td>
 	</tr>
 	</table>
 	</form>
 	<?php
<<<<<<< HEAD
 	break;
 	
 	case 'profile':
	echo "Profile";
 	break;
 	
 	case 'reserve_submit':
 		if(isset($_SESSION['sdate'])){
 			 $date=$_SESSION['sdate'];
 		}else{
 			 $date=date::jdate('Y/m/j','','','','en');
 		}
 		if(isset($_SESSION['insurance_id'])){
 			 $insurance=$_SESSION['insurance_id'];
 		}else{
 			 $insurance='2';
 		}
 		$specialty=$_SESSION['specialty'];
 		$time=$_SESSION['time_reserve'];
 		$doctor=$_SESSION['doctor_id'];
 		$pateint=$userInfo['id'];
 		$chkvisittime = $database->getCountRow("SELECT pateint_id FROM `visit_time` WHERE doctor_id =? and date=? ", array($doctor,$date));
		if($chkvisittime>=1){
		die("<div align='center' style='color:red;font-size:16px;'>امکان رزرو وقت برای هر پزشک در هر روز فقط یک بار می باشد</div> ");
=======
		break;

	case 'profile':
	?>
		<b class="title" style="font-size: 25px; color: #f00;">ویرایش اطلاعات</b>
		<hr>
	<?php
	$getuser = $database->getRow("SELECT * FROM pateint WHERE id =?", array($userInfo['id']));

	?>
				<div style="margin-top: -10px;margin-right: -22px;">
				<form action="personal.php?page=profile"  enctype="multipart/form-data" method="post">

				<table style="width: 750px; float: right;" dir="rtl">

				<tr style="height: 50px;">
					<td align="left"><label class="text">* نام و نام خانوادگی </label></td>
					<td>
					<input id="name" name="name"  class="input" type="text" style="width: 220px;" onblur="CheckEmpty();" value="<?=$getuser['name']?>">
					<div id="n" class="error"></div>
					</td>
				</tr>

				<tr>
					<td style="height: 30px;" align="left"><label class="text" >* کلمه عبور قبلی</label></td>
					<td><input id="user"  name="oldpassword" class="input" type="password" >
					<div id="p" class="error"></div>
					</td>
					<td align="left"><label class="text">* کلمه عبور جدید</label></td>
					<td><input id="pass"  name="password" class="input" type="password" >
					<div id="p" class="error"></div>
					</td>
				</tr>

				<tr>
					<td style="height: 50px;" align="left"><label class="text">* کد ملی</label></td>
					<td>
					<input id="melicode"  name="melicode" maxlength="10" class="input" type="text"
					placeholder="مثال: 0780123456"  onblur="CheckEmpty();" onKeyUp="numericFilter(this);" value="<?=$getuser['melicode']?>">
					<div id="mc" class="error"></div>
					</td>

					<td align="left" ><label class="text">* جنسیت</label></td>
					<td style="width: 60px;">
					<table style="width: 205px;">
					<tr>
						<td>
						<select id="gender"  name="gender" class="input" style="height: 34px;" >
						<?php
	    $gender = $getuser['gender'];
	if ($gender == 'male') {
		print("
		<option selected='selected' value='male'>مرد</option>
		<option value='female'>زن</option>
		");
	} else {
		print("
		<option selected='selected' value='female'>زن</option>
		<option value='male'>مرد</option>
		");
	}

	?>
						</select>
						</td>
						<td align="left" ><label class="text">* سن</label></td>
						<td align="right" >
						<input id="age" name="age"  class="input" type="text" style="width: 40px;"
						 maxlength="3" onKeyUp="numericFilter(this);" onblur="CheckEmpty();" value="<?=$getuser['age'];?>">
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
                      <div style="position: absolute; width: 100px; margin-right: 200px; margin-top: -60px;">
                      <div id="img"  style="position: absolute; z-index: 1002;" align="center">
                       <div align="center" style="width:77px;height:30px;line-height:30px; position: absolute; margin-right: 0px;z-index: 1001; background-color: #999; opacity:0.5;color:#fff;">

                      <?php
	$getpic = $getuser['pic'];
	if ($getpic == "none.png") {
		print "<div align='center'>بدون تصویر</div>";
	} else {
		print "<input type='buttom' value='حذف تصویر' class='btn2' style='border-radius:0px; width:71px; text-align:center;'
 								   onclick='delimg(this.value)'>";
	}

	?>
                      </div>
                      <img src="images/pic/<?=$getuser['pic']?>" width="75" height="90" style="position: relative; border: 1px solid #ccc;"></div>
                      </div>
                      <div class="error">فرمت قابل قبول:jpg</div>
                      </td>
                      <td align="left" ><label class="text">* نوع بیمه</label></td>
                      <td>
                      <select id="insurance" name="insurance"  class="input" style="height: 34px; width: 180px;">
                      <?php $getinsurance = $database->getRow("SELECT * FROM insurance WHERE id =?", array($getuser['insurance_id'])); ?>
                      <option style="background-color: #ccc; color: #f00;" selected="selected"  value="<?=$getuser['insurance_id']?>"><?=$getinsurance['cname'] ?> (انتخاب شده)</option>
                      <?php
						    $getrows = $database->getRows("SELECT * FROM insurance");
							foreach ($getrows as $row) { ?>
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
					<input id="mobile"  name="mobile" maxlength="11"   class="input" type="text"
					placeholder="مثال: 09151234567"  onblur="CheckEmpty();" onKeyUp="numericFilter(this);" value="<?=$getuser['mobile']?>">
					<div id="m" class="error" ></div>
					</td>
					<td align="left"><label class="text">ایمیل</label></td>
					<td><input id="email"  name="email"  class="input" type="text"
					placeholder="مثال: test@test.com"  value="<?=$getuser['email']?>"></td>
				</tr>

				<tr>
					<td style="height: 95px;" align="left"><label class="text"> آدرس</label></td>
					<td><textarea id="address" name="address" class="input"  style="width: 300px; height: 70px;"
					   onkeypress="return imposeMaxLength(this, 150);"  onblur="CheckEmpty();"><?=$getuser['address']?></textarea></td>
					<td></td>
				</tr>

				<tr>
					<td></td>
					<td>
					<input class="btn2"  name="edit"  type="submit"  value="ویرایش" >
					</td>
				</tr>

				</table>

				</form>
				</div>
		</div>

	<?php

	break;

	case 'history':
			?>
		<b class="title" style="font-size: 25px; color: #f00;">تاریخچه وقت های رزرو شده</b>
		<hr>
		<table dir="rtl" style="width: 650px; background-color: #ccc; border-radius:8px;">
		<tr bgcolor="#ccc" height="35">
		<th>تاریخ</th>
		<th>ساعت<th>
		<th>تخصص</th>
		<th>پزشک</th>
		<th>بیمه</th>
		<th>کد رهیگری</th>
		</tr>
		<?php
		$getv = $database->getRows("SELECT * FROM `visit_time` WHERE `pateint_id` =?", array($userInfo['id']));
		foreach ($getv as $row) {
		$getd=$database->getRow("SELECT * FROM `doctor` WHERE `id` =?", array($row['doctor_id']));
		$geti=$database->getRow("SELECT * FROM `insurance` WHERE `id` =?", array($row['insurance_id']));
		$gets=$database->getRow("SELECT * FROM `specialty` WHERE `id` =?", array($row['specialty_id']));
		?>
		<tr height="38"  class="nav" align="center" style="color: #666">
		<td bgcolor="#efefef" style="color: #777; font-size: 16px;"><?=$row['date']?></td>
		<td bgcolor="#efefef" style="color: #777; font-size: 16px;"><?=$row['time']?></td>
		<td bgcolor="#ccc"></td>
		<td><?=$gets['title']?></td>
		<td><?=$getd['name']?></td>
		<td><?=$geti['cname']?></td>
		<td><?=$row['code']?></td>
		</tr>
		<?php } ?>
		</table>
		
		<?php
		break;

	case 'reserve_submit':
		if (isset($_SESSION['sdate'])) {
			$date = $_SESSION['sdate'];
		} else {
			$date = date::jdate('Y/m/d', '', '', '', 'en');
		}
		if (isset($_SESSION['insurance_id'])) {
			$insurance = $_SESSION['insurance_id'];
		} else {
			$getinsurance = $database->getCountRow("SELECT * FROM `spec_ins` WHERE insurance_id=? and specialty_id =?",
			    array($userInfo['insurance_id'], $_SESSION['specialty']));
			if ($getinsurance == 1) {
				$insurance = $userInfo['insurance_id'];
			} else {
				$insurance = '2';
			}
		}
		$specialty = $_SESSION['specialty'];
		$time = $_SESSION['time_reserve'];
		$doctor = $_SESSION['doctor_id'];
		$pateint = $userInfo['id'];
		$code = mt_rand(1000000000, 9999999999);
		$chkvisittime = $database->getCountRow("SELECT * FROM `visit_time` WHERE doctor_id =? and date=? and pateint_id=? ", array($doctor, $date,$pateint));
		if ($chkvisittime >= 1) {
			die("<div align='center' style='color:red;font-size:16px;'>امکان رزرو وقت برای هر پزشک در هر روز فقط یک بار می باشد</div> ");
>>>>>>> a8ed6794923d67d9565beb9b1d7f485cc44fb5fd
		}
		$chkvisittime2 = $database->getCountRow("SELECT pateint_id FROM `visit_time` WHERE time =? and date=?", array($time, $date));
		if ($chkvisittime2 >= 1) {
			die("<div align='center' style='color:red;font-size:16px;'>رزرو وقت در این تاریخ و زمان به علت ثبت وقت در همین بازه در تخصصی دیگر امکان پذیر نمی باشد</div> ");
		}
		$insertrow = $database->insertRow("INSERT INTO visit_time
							(specialty_id,doctor_id,pateint_id,insurance_id,date,time,code) VALUES (?,?,?,?,?,?,?)" , array($specialty, $doctor, $pateint, $insurance, $date, $time, $code));
		print("<div align='center' style='color:green;font-size:16px;'>ثبت وقت با موفقیت انجام گردید<br><b align='center' style='color:red;font-size:20px;'> کد پیگیری:" . $code . " </b></div>");
		break;
		
		default:
			echo 'صفحه مورد نظر موجود نمی باشد';
		break;	
}

?>
