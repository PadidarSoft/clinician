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
	$getuser = $database->getRow("SELECT * FROM manager WHERE id =?", array($userInfo['id']));

	?>
				<div style="margin-top: -10px;margin-right: -22px;">
				<form action="personal.php?page=profile"  enctype="multipart/form-data" method="post">

				<table style="width: 750px; float: right;" dir="rtl">

				<tr style="height: 50px;">
					<td align="left"><label class="text">* نام و نام خانوادگی </label></td>
					<td>
					<input id="name" name="name"  class="input" type="text" style="width: 173px;" onblur="CheckEmpty();" value="<?=$getuser['name']?>">
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
					<td align="left"><label class="text">ایمیل</label></td>
					<td style="height: 30px;" ><input id="email"  name="email"  class="input" type="text"
					placeholder="مثال: test@test.com"  value="<?=$getuser['email']?>"></td>					
					<td style="height: 60px;" align="left"></td>
					</td>
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
		{
		?>
	<b  class="title" style="font-size: 25px; color: #f00;">ثبت خبر</b>
 	 		<div align="center" class="btn2" onclick="addpanel('addnews')"
 	 		style="width:120px;height:30px;line-height:30px;position:absolute;margin-left:150px;margin-top:5px;  ">
 			افزودن خبر <img  src="../images/icon/add.png" style="vertical-align:middle; margin-right:-5px;" />
 			</div>
 			<div align="center" class="btn2" id="list" onclick="addnews()">
 			مشاهده همه <img  src="../images/icon/list.png" style="vertical-align:middle; margin-right:-5px;" />
 			</div>
 	<br><hr>
 	<div align="right" style="display: inline-block; width: 600px;">

 	<form action="">
 	<table dir="rtl" class="text" style="width: 650px; float: right;">
 		<tr>
 			<div class="text" style="font-size: 18px; margin-right: 80px;">:جستجو خبر</div>
 		</tr>
 		<td align="right">بر اساس عنوان:
 		<input type="text" name="news" class="input" placeholder="عنوان خبر"  style="width: 200px;" onkeyup="search('news',this.value)">
 		</td>
 	</tr>
 	</table>
 	</div>
 	<p></p>
 	<div align="right" id="txtHint" style="display: inline-block; width: 600px;">
		 <?php
				$getrows = $database->getRows("SELECT * FROM news ORDER BY `id`  DESC LIMIT 0,10");
				foreach ($getrows as $row) {
					?>
					<div class="nav2" style="width:500px;">
					<table>
					<tr>
					<td align="left">
						<table>
						<tr>
							<td>
								<a rel="<?=$row['id'] ?>" title="حذف اطلاعات" onclick="removepanel('deletenews',this.rel);">
								<img class="image2" title="حذف اطلاعات" src="../images/icon/remove.png" style="vertical-align:middle" />
								</a>
							</td>
							<td>
								<a rel="<?=$row['id'] ?>" title="ویرایش اطلاعات" onclick="editpanel('editnews',this.rel);">
								<img class="image2" title="ویرایش اطلاعات" src="../images/icon/edit.png" style="vertical-align:middle" />
								</a>
							</td>
						</tr>
						</table>
					</td>
					<td dir="rtl" align="center" style="width:160px;">
					تاریخ: <?=$row['date'] ?>
					</td>					
					<td align="right" style="width:280px;">
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
		}
		break;	
}

?>