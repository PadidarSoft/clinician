<?php
include('../libs/bootstrap.php');
$userInfo = auth();

?>
<!DOCTYPE html>
<html>
<?php
include("header.php");
switch ($page) {
	case 'home':
		{
			
		}
	break;
	
	case 'doctor':
		{
		?>
	<b  class="title" style="font-size: 25px; color: #f00;">تعریف پزشک</b>
 	 		<div align="center" class="btn2" onclick="addpanel('doctor')"
 	 		style="width:120px;height:30px;line-height:30px;position:absolute;margin-left:150px;margin-top:5px;  ">
 			افزودن پزشک <img  src="../images/icon/add.png" style="vertical-align:middle; margin-right:-5px;" />
 			</div>
 			<div align="center" class="btn2" id="list" onclick="doctor()">
 			مشاهده همه <img  src="../images/icon/list.png" style="vertical-align:middle; margin-right:-5px;" />
 			</div>
 	<br><hr>
 	<div align="right" style="display: inline-block; width: 600px;">

 	<form action="">
 	<table dir="rtl" class="text" style="width: 650px; float: right;">
 		<tr>
 			<div class="text" style="font-size: 18px; margin-right: 80px;">:جستجو پزشک</div>
 		</tr>
 	<tr>
 		<td align="right">بر اساس کد:
 		<input type="text" name="driver_code" class="input" placeholder="کد پزشک" onkeypress="return IsNumeric(event);"
 		 ondrop="return false;" onpaste="return false;" style="width: 200px;" onkeyup="search('doctorcode',this.value)">
    	<span id="error" style="color: Red; display: none">* ورودی به صورت عدی بین (0 تا 9)</span>
 		</td>
 	</tr>
 	 	<tr>
 		<td align="right">بر اساس نام:
 		<input type="text" name="driver_code" class="input" placeholder="نام و نام خانوادگی پزشک"  style="width: 200px;" onkeyup="search('doctorname',this.value)">
 		</td>
 	</tr>
 	</table>
 	</div>
 	<p></p>
 	<div align="right" id="txtHint" style="display: inline-block; width: 600px;">
		 <?php
				$getrows = $database->getRows("SELECT * FROM doctor ORDER BY `id`  DESC LIMIT 0,10");
				foreach ($getrows as $row) {
					$sid=$row['specialty_id'];
					$gets = $database->getRow("SELECT * FROM specialty WHERE id={$sid}");
					?>
					<div class="nav2" style="width:600px;">
					<table>
					<tr>
					<td align="left">
						<table>
						<tr>
							<td>
								<a rel="<?=$row['id'] ?>" title="حذف اطلاعات" onclick="removepanel('doctor',this.rel);">
								<img class="image2" title="حذف اطلاعات" src="../images/icon/remove.png" style="vertical-align:middle" />
								</a>
							</td>
							<td>
								<a rel="<?=$row['id'] ?>" title="ویرایش اطلاعات" onclick="editpanel('doctor',this.rel);">
								<img class="image2" title="ویرایش اطلاعات" src="../images/icon/edit.png" style="vertical-align:middle" />
								</a>
							</td>
						</tr>
						</table>
					</td>
					<td align="center" style="width:150px;">
					<?=$row['code'] ?> :کد
					</td>
					<td dir="rtl" align="center" style="width:180px;">
					تخصص: <?=$gets['title'] ?>
					</td>					
					<td align="right" style="width:180px;">
						<?=$row['name'] ?>
					</td>
					</tr>
					</table>
					</div>
		<?php
				}
		?>
 	</div>
 	</form>
		<?php
		}
	break;

	case 'specialty':
		?>
 	<b  class="title" style="font-size: 25px; color: #f00;">تعریف تخصص</b>
 	 		<div align="center" class="btn2" onclick="addpanel('specialty')"
 	 		style="width:120px;height:30px;line-height:30px;position:absolute;margin-left:150px;margin-top:5px;  ">
 			افزودن تخصص <img  src="../images/icon/add.png" style="vertical-align:middle; margin-right:-5px;" />
 			</div>
 	<br><hr>
 	<div align="right" style="display: inline-block; width: 600px;">

 	<form action="">
 	<div align="right" id="txtHint" style="display: inline-block; width: 600px;">
		 <?php
				$getrows = $database->getRows("SELECT * FROM specialty ORDER BY `id`  DESC LIMIT 0,20");
				foreach ($getrows as $row) { ?>

					<div class="nav2">
						<table>
						<tr>
						<td align="left">
						<table>
						<tr>
						<td>
							<a onclick="removepanel('specialty',this.rel)" rel="<?=$row['id'] ?>" title="حذف اطلاعات">
							<img class="image2" title="حذف اطلاعات" src="../images/icon/remove.png" style="vertical-align:middle" />
							</a>
						</td>
						<td>
							<a onclick="editpanel('specialty',this.rel)" rel="<?=$row['id'] ?>" title="ویرایش اطلاعات">
							<img class="image2" title="ویرایش اطلاعات" src="../images/icon/edit.png" style="vertical-align:middle" />
							</a>
						</td>
						</tr>
						</table>
						</td>
						<td dir="rtl" align="center" style="width:150px;">
						</td>
						<td align="right" style="width:180px;">								
							<?=$row['title'] ?>
						</td>
						</tr>
						</table>
					</div>
		<?php
				}
		?>
 	</div>
 	</form>
 	<?php
		break;

	case 'profile':
	?>
		<b class="title" style="font-size: 25px; color: #f00;">ویرایش اطلاعات</b>
		<hr>
	<?php
	$getuser = $database->getRow("SELECT * FROM doctor WHERE id =?", array($userInfo['id']));

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
	$getpic = $getuser['img'];
	if ($getpic == "none.png") {
		print "<div align='center'>بدون تصویر</div>";
	} else {
		print "<input type='buttom' value='حذف تصویر' class='btn2' style='border-radius:0px; width:71px; text-align:center;'
 		onclick='delimg(this.value)'>";
	}

	?>
                      </div>
                      <img src="../images/doctor/<?=$getuser['img']?>" width="75" height="90" style="position: relative; border: 1px solid #ccc;"></div>
                      </div>
                      <div class="error">فرمت قابل قبول:jpg</div>
                      </td>
                      <td align="left" ><label class="text">* مدرک تحصیلی</label></td>
                      <td>
                      <input id="email"  name="education"  class="input" type="text"
					  value="<?=$getuser['education']?>">
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

	case 'feevisit':
		?>
 	<b  class="title" style="font-size: 25px; color: #f00;">تعریف نرخ ویزیت</b>
 	 		<div align="center" class="btn2" onclick="addpanel('feevisit')"
 	 		style="width:120px;height:30px;line-height:30px;position:absolute;margin-left:150px;margin-top:5px;  ">
 			افزودن نرخ <img  src="../images/icon/add.png" style="vertical-align:middle; margin-right:-5px;" />
 			</div>
 	<br><hr>
 	<p></p> 	
 	<div align="right" style="display: inline-block; width: 600px;">

 	<form action="">
 	<div align="right" id="txtHint" style="display: inline-block; width: 600px;">
		 <?php
				$getrows = $database->getRows("SELECT * FROM spec_ins ORDER BY `id`  DESC LIMIT 0,6");
				foreach ($getrows as $row) {
				$getspecialty = $database->getRow("SELECT * FROM `specialty` WHERE id =?", array($row['specialty_id']));
				$getinsurance = $database->getRow("SELECT * FROM `insurance` WHERE id =?", array($row['insurance_id']));
				?>
					<div class="nav2" style="width:600px;">
						<table>
						<tr>
						<td align="left">
						<table>
						<tr>
						<td>
							<a onclick="removepanel('feevisit',this.rel)" rel="<?=$row['id'] ?>" title="حذف اطلاعات">
							<img class="image2" title="حذف اطلاعات" src="../images/icon/remove.png" style="vertical-align:middle" />
							</a>
						</td>
						<td>
							<a onclick="editpanel('feevisit',this.rel)" rel="<?=$row['id'] ?>" title="ویرایش اطلاعات">
							<img class="image2" title="ویرایش اطلاعات" src="../images/icon/edit.png" style="vertical-align:middle" />
							</a>
						</td>
						</tr>
						</table>
						</td>
						<td align="right" style="width:200px;">								
							نرخ :<?=$row['fee'] ?> تومان
						</td>							
						<td dir="rtl" align="center" style="width:280px;font-size:14px;">
							بیممه :<?=$getinsurance['cname'] ?>							
						</td>
						<td align="right" style="width:200px;">								
							تخصص :<?=$getspecialty['title'] ?>
						</td>					
						</tr>
						</table>
					</div>
		<?php
				}
		?>
 	</div>
 	</form>
 	<?php
		break;
		
	case 'insurance':
		?>
	 	<b  class="title" style="font-size: 25px; color: #f00;">تعریف بیمه</b>
	 	<div align="center" class="btn2" onclick="addpanel('insurance')"
	 	style="width:120px;height:30px;line-height:30px;position:absolute;margin-left:150px;margin-top:5px;  ">
	 	افزودن بیمه <img  src="../images/icon/add.png" style="vertical-align:middle; margin-right:-5px;" />
	 	</div>
	 	<br><hr>
	 	<div align="right" style="display: inline-block; width: 600px;">
	 	<form action="">
	 	<div align="right" id="txtHint" style="display: inline-block; width: 600px;">
		<?php
			$getrows = $database->getRows("SELECT * FROM insurance ORDER BY `id`  DESC LIMIT 0,20");
			foreach ($getrows as $row) { ?>
			<div class="nav2">
				<table>
				<tr>
				<td align="left">
				<table>
				<tr>
				<td>
					<a onclick="removepanel('insurance',this.rel)" rel="<?=$row['id'] ?>" title="حذف اطلاعات">
					<img class="image2" title="حذف اطلاعات" src="../images/icon/remove.png" style="vertical-align:middle" />
					</a>
				</td>
				<td>
					<a onclick="editpanel('insurance',this.rel)" rel="<?=$row['id'] ?>" title="ویرایش اطلاعات">
					<img class="image2" title="ویرایش اطلاعات" src="../images/icon/edit.png" style="vertical-align:middle" />
					</a>
				</td>
				</tr>
				</table>
				</td>
				<td dir="rtl" align="center" style="width:150px;">
				</td>
				<td align="right" style="width:180px;">								
					<?=$row['cname'] ?>
				</td>
				</tr>
				</table>
			</div>
			<?php
				}
			?>
	 	</div>
	 	</form>
 	<?php
		break;

		
	case 'addnews':
		?>
		addnews
		<?php
		break;	
}

?>