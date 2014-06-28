<?php
include('../libs/bootstrap.php');
$userInfo = auth();


//show Insert Panel
if(isset($_GET['addpanel'])){
	$item=$_GET["addpanel"];
switch ($item) {
		case 'specialty':
?>			
		<div id="showresult" dir="rtl" class="text" style="font-size:18px; margin-top:150px;margin-right:100px;">
		<span id="error" style="color: Red; font-size:13px; 
		display: none; position: absolute; margin-top:-30px; margin-right:55px;">
			* ورودی به صورت عدی بین (0 تا 9)</span>
		<form action="#">
		<table>
			<tr>
			<td align="left">
				عنوان
			</td>
			<td>
				<input type="text" class="input" name="title" style="width:130px;height:30px;"/>
			</td>
			</tr>
			<tr>
			<td align="left">
				بازه زمانی
			</td>
			<td>
				<input type="text" onkeypress="return IsNumeric(event);" class="input" name="pt" style="width: 80px;height:30px;" maxlength="2"/> دقیقه
			</td>
			</tr>
			<tr>
			<td></td>
			<td>
			<input type="button" onclick="formget(this.form,'send.php?item=addspecialty')"
			class="btn2" name="edit" value="ثبت اطلاعات" style="width:95px;" />
			</td>
			</tr>
		</table>
		</form>
		</div>
		<?php
			break;
			
			
		case 'doctor':
		?>
		<div id="showresult" dir="rtl" class="text" style="font-size:15px; margin-right: 30px;">
		<span id="error" style="color: Red; font-size:13px; 
		display: none; position: absolute; margin-top:-30px; margin-right:55px;">
			* ورودی به صورت عدی بین (0 تا 9)</span>
		<form action="#">
		<table>
			<tr>
			<td align="left">نام و نام خانوادگی:</td>
			<td><input name="name" type="text" class="input" /></td>
			</tr>
			<tr>
			<td align="left">نام کاربری:</td>
			<td><input name="username" type="text" class="input" /></td>
			</tr>
			<tr>
			<td align="left">کلمه عبور:</td>
			<td><input name="password" type="password" class="input" /></td>
			</tr>
			<tr>
			<td align="left">تخصص:</td>
			<td>
			<select dir="rtl" name="specialty_id" class="input" style="width:185px;height:30px;">
			<?php 
            $getrows = $database->getRows("SELECT * FROM specialty");
              foreach ($getrows as $row) {
             ?>
			  <option dir="rtl" value="<?=$row['id']?>"><?=$row['title']?></option>
			  <?php 
			  }
			  ?>
			</select>
			</td>
			</tr>
			<tr>
			<td align="left">کد نظام پزشکی:</td>
			<td><input name="code" type="text" class="input" maxlength="7" onkeypress="return IsNumeric(event);"/></td>
			</tr>
			<tr>
			<td align="left">کد ملی:</td>
			<td><input name="melicode" type="text" class="input" maxlength="10" onkeypress="return IsNumeric(event);"/></td>
			</tr>
			<tr>
			<td align="left">جنسیت:</td>
			<td>
			<select class="input" name="gender" style="height:30px;">
				<option value="male">مرد</option>
				<option value="female">زن</option>
			</select>
			</td>
			</tr>
			<tr>
			<td align="left">تلفن تماس:</td>
			<td><input name="mobile" type="text" class="input" maxlength="11" onkeypress="return IsNumeric(event);"/></td>
			</tr>
			<tr>
			<td align="left">مدرک تحصیلی:</td>
			<td><input name="education" type="text" class="input" /></td>
			</tr>			
			<tr>
			<td align="left">ایمیل:</td>
			<td><input name="email" type="text" class="input" /></td>
			</tr>
			<tr>
			<td align="left">
				ادرس :
			</td>
			<td>
				<textarea name="address" class="input"  style="width: 170px; height: 35px;resize: none;"
				onkeypress="return imposeMaxLength(this, 150);"  onblur="CheckEmpty();"></textarea>
			</td>
			</tr>
			<tr valign="top">
			<td></td>
			<td>
			<input type="button" onclick="formget(this.form,'send.php?item=adddoctor')"
			class="btn2" name="edit" value="ثبت اطلاعات" style="width:95px;" />
			</td>
			</tr>																											
		</table>
		</form>
		</div>		

 		<?php
			break;
			
			
		case 'insurance':
?>			
		<div id="showresult" dir="rtl" class="text" style="font-size:18px; margin-top:100px;margin-right:70px;">
			<span id="error" style="color: Red; font-size:13px; 
			display: none; position: absolute; margin-top:-30px; margin-right:55px;">
				* ورودی به صورت عدی بین (0 تا 9)</span>
			<form action="#">
			<table>
			<tr>
			<td align="left">
				نام شرکت:
			</td>
			<td>
				<input type="text" class="input" name="cname" style="width:130px;height:30px;"/>
			</td>
			</tr>
			<tr>
			<td align="left">
				نوع:
			</td>
			<td>
				<input type="text" class="input" name="type" style="width:130px;height:30px;"/>
			</td>
			</tr>
			<tr>
			<td align="left">
				توضیحات:
			</td>
			<td>
				<textarea name="des" class="input"  style="width: 170px; height: 70px;resize: none;"
				onkeypress="return imposeMaxLength(this, 150);"  onblur="CheckEmpty();"></textarea>
			</td>
			</tr>
			<tr>
			<td></td>
			<td>
			<input type="button" onclick="formget(this.form,'send.php?item=addinsurance')"
			class="btn2" name="edit" value="ثبت اطلاعات" style="width:95px;" />
			</td>
			</tr>
			</table>
			</form>
		</div>
		<?php
			break;	
							
		case 'feevisit':
?>			
		<div id="showresult" dir="rtl" class="text" style="font-size:18px; margin-top:150px;margin-right:100px;">
		<span id="error" style="color: Red; font-size:13px; 
		display: none; position: absolute; margin-top:-30px; margin-right:55px;">
			* ورودی به صورت عدی بین (0 تا 9)</span>
		<form action="#">
		<table>
			<tr>
			<td align="left">
				تخصص:
			</td>
			<td>
			<select dir="rtl" name="specialty_id" class="input" style="width:185px;height:30px;" onchange="ins_type(this.value)">
			<?php 
            $getrows = $database->getRows("SELECT * FROM specialty");
              foreach ($getrows as $row) {
             ?>
			  <option dir="rtl" value="<?=$row['id']?>"><?=$row['title']?></option>
			  <?php 
			  }
			  ?>
			</select>
			</td>
			</tr>
			<tr>
			<td align="left">
				بیمه:
			</td>
			<td>
			<div id="ins_type">
			<select dir="rtl" disabled="disabled" name="insurance_id" class="input"
			 style="width:185px;height:30px; background-color:#cecece;">
				<option >ابتدا تخصص را انتخاب نمایید</option>
			</select>	
			</div>

			</td>
			</tr>
			<tr>
			<td align="left">
				مبلغ:
			</td>
			<td>
				<input type="text" onkeypress="return IsNumeric(event);" class="input" name="fee" style="width: 120px;height:30px;"/> تومان
			</td>
			</tr>			
			<tr>
			<td></td>
			<td>
			<input type="button" onclick="formget(this.form,'send.php?item=addfeevisit')"
			class="btn2" name="edit" value="ثبت اطلاعات" style="width:95px;" />
			</td>
			</tr>
		</table>
		</form>
		</div>
		<?php
			break;
			
		case 'editnews':
			echo "editnews";
			break;		
}
}

//show Edit Panel

if(isset($_GET['editpanel'])){

	$item=$_GET["editpanel"];
	$id=$_GET["id"];
	
	switch ($item) {
		case 'specialty':
		$getspecialty = $database->getRow("SELECT * FROM `specialty` WHERE id =?", array($id));	
?>			
		<div id="showresult" dir="rtl" class="text" style="font-size:18px; margin-top: 50px;margin-right:20px;">
		<span id="error" style="color: Red; font-size:13px; 
		display: none; position: absolute; margin-top:-30px; margin-right:55px;">
			* ورودی به صورت عدی بین (0 تا 9)</span>
			<form action="#">
			<table>
				<tr>
					<td align="left">
						عنوان
					</td>
					<td>
						<input type="text" style="display:none;" value="<?=$getspecialty['id']?>" name="id"/>						
						<input type="text" class="input" value="<?=$getspecialty['title']?>" name="title" style="width:130px;"/>
					</td>
				</tr>
				<tr>
					<td align="left">
						بازه زمانی
					</td>
					<td>
						<input type="text" value="<?=$getspecialty['periood_time']?>" onkeypress="return IsNumeric(event);" class="input" name="pt" style="width: 80px;" maxlength="2"/> دقیقه
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="button" onclick="formget(this.form,'send.php?item=editspecialty')"
				 		class="btn2" name="edit" value="ویرایش اطلاعات" style="width:95px;" />
				 	</td>
				</tr>
			</table>
			</form>
		</div>
<?php
			break;
		case 'doctor':
		$getdoctor = $database->getRow("SELECT * FROM `doctor` WHERE id =?", array($id));
		$getspecialty = $database->getRow("SELECT * FROM `specialty` WHERE id =?", array($getdoctor['specialty_id']));	
?>			
		<div id="showresult" dir="rtl" class="text" style="font-size:18px; margin-top: 50px;margin-right:20px;">
		<span id="error" style="color: Red; font-size:13px; 
		display: none; position: absolute; margin-top:-30px; margin-right:55px;">
			* ورودی به صورت عدی بین (0 تا 9)</span>
			<form action="#">
			<table>
			<tr>
			<td align="left">
				نام و نام خانوادگی:
			</td>
			<td>
				<input type="text" style="display:none;" value="<?=$getdoctor['id']?>" name="id"/>						
				<input type="text" class="input" value="<?=$getdoctor['name']?>" name="name"/>
			</td>
			</tr>			
			<tr>
			<td align="left">
				کد نظام پزشکی:
			</td>
			<td>
				<input type="text" value="<?=$getdoctor['code']?>" onkeypress="return IsNumeric(event);" class="input" name="code" maxlength="7"/>
			</td>
			</tr>
			<tr>
			<td align="left" >تخصص:</td>
			<td>
			<select dir="rtl" name="specialty_id" class="input" style="width:185px;height:30px;">
			  <option style="background-color:#ccc; color:red;" selected="selected" dir="rtl" value="<?=$getspecialty['id']?>"><?=$getspecialty['title']?> (انتخاب شده)</option>				
			<?php 
            $getrows = $database->getRows("SELECT * FROM specialty");
              foreach ($getrows as $row) {
             ?>
			  <option dir="rtl" value="<?=$row['id']?>"><?=$row['title']?></option>
			  <?php 
			  }
			  ?>
			</select>
			</td>
			</tr>			
			<tr>
			<td align="left" >جنسیت:</td>
			<td>
			<select id="gender"  name="gender" class="input" style="height: 29px;" >
				<?php
			    $gender = $getdoctor['gender'];
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
			<tr>
			<td align="left">
				تلفن تماس:
			</td>
			<td>
				<input type="text" value="<?=$getdoctor['mobile']?>" onkeypress="return IsNumeric(event);" class="input" name="mobile" maxlength="11"/>
			</td>
			</tr>			
			<tr>
			<td></td>
			<td>
				<input type="button" onclick="formget(this.form,'send.php?item=editdoctor')"
				 class="btn2" name="edit" value="ویرایش اطلاعات" style="width:95px;" />
			</td>
			</tr>
			</table>
			</form>
		</div>
		<?php
			break;
			
		case 'insurance':
			$getinsurance = $database->getRow("SELECT * FROM `insurance` WHERE id =?", array($id));
		?>	
		<div id="showresult" dir="rtl" class="text" style="font-size:18px; margin-top:50px;margin-right:50px;">
			<span id="error" style="color: Red; font-size:13px; 
			display: none; position: absolute; margin-top:-30px; margin-right:55px;">
				* ورودی به صورت عدی بین (0 تا 9)</span>
			<form action="#">
			<table>
			<tr>
			<td align="left">
				نام شرکت:
			</td>
			<td>
				<input type="text" style="display:none;" value="<?=$getinsurance['id']?>" name="id"/>										
				<input type="text" class="input" name="cname" value="<?=$getinsurance['cname']?>" style="width:130px;height:30px;"/>
			</td>
			</tr>
			<tr>
			<td align="left">
				نوع:
			</td>
			<td>
				<input type="text" class="input" value="<?=$getinsurance['type']?>" name="type" style="width:130px;height:30px;"/>
			</td>
			</tr>
			<tr>
			<td align="left">
				توضیحات:
			</td>
			<td>
				<textarea name="des" class="input"  style="width: 170px; height: 70px;resize: none;"
				onkeypress="return imposeMaxLength(this, 150);"  onblur="CheckEmpty();">
				<?=$getinsurance['des']?>
				</textarea>
			</td>
			</tr>
			<tr>
			<td></td>
			<td>
			<input type="button" onclick="formget(this.form,'send.php?item=editinsurance')"
			class="btn2" name="edit" value="ثبت اطلاعات" style="width:95px;" />
			</td>
			</tr>
			</table>
			</form>
		</div>
		<?php
			break;	
							
		case 'feevisit':
			$getspec_ins = $database->getRow("SELECT * FROM `spec_ins` WHERE id =?", array($id));
			$getspecialty = $database->getRow("SELECT * FROM `specialty` WHERE id =?", array($getspec_ins['specialty_id']));
			$getinsurance = $database->getRow("SELECT * FROM `insurance` WHERE id =?", array($getspec_ins['insurance_id']));
		?>	
		<div id="showresult" dir="rtl" class="text" style="font-size:18px; margin-top:50px;margin-right:50px;">
			<span id="error" style="color: Red; font-size:13px; 
			display: none; position: absolute; margin-top:-30px; margin-right:55px;">
				* ورودی به صورت عدی بین (0 تا 9)</span>
			<form action="#">
			<table>
			<tr>
			<td align="left">
				تخصص:
			</td>
			<td>
			<input type="text" style="display:none;" value="<?=$getdoctor['id']?>" name="id"/>										
			<select dir="rtl" name="specialty_id" class="input" style="width:185px;height:30px;">
			<option selected="selected" value="<?=$getspecialty['id']?>"><?=$getspecialty['title']?>(انتخاب شده)</option>
			</select>
			</td>
			</tr>
			<tr>
			<td align="left">
				بیمه:
			</td>
			<td>
			<div id="ins_type">
				<select dir="rtl" name="insurance_id" class="input" style="width:185px;height:30px;">	
					<option selected="selected" value="<?=$getinsurance['id']?>"><?=$getinsurance['cname']?>(انتخاب شده)</option>
				
				</select>	
			</div>

			</td>
			</tr>
			<tr>
			<td align="left">
				مبلغ:
			</td>
			<td>
				<div id="fee">
				<input type="text" onkeypress="return IsNumeric(event);" class="input" name="fee" value="<?=$getspec_ins['fee']?>" style="width: 120px;height:30px;"/> تومان					
				</div>
			</td>
			</tr>			
			<tr>
			<td></td>
			<td>
			<input type="button" onclick="formget(this.form,'send.php?item=editfeevisit')"
			class="btn2" name="edit" value="ثبت اطلاعات" style="width:95px;" />
			</td>
			</tr>
			</table>
			</form>
		</div>
		<?php
			break;
		case 'editnews':
			echo "editnews";
			break;			
	}

}

//show Delete Panel

if(isset($_GET['deletepanel'])){

	$item=$_GET["deletepanel"];
	$id=$_GET["id"];
	
	switch ($item) {
		case 'specialty':
		$getspecialty = $database->getRow("SELECT * FROM `specialty` WHERE id =?", array($id));
?>
	<div id="aaa" align="center">
	<span dir="rtl" class="text" style="font-size:16px;">آیا شما از حذف آیتم (<b class="error" style="font-size:18px;"><?=$getspecialty['title']?></b>) اطمینان دارید ؟</span>	
	<img src="../images/remove.png" style="vertical-align:middle;" />
	<table>
		<tr>
			<td><input id="closebtn" onclick="$('#removepanel').hide();" type="button" value="خیر" class="btn2" /></td>
			<td><input type="button" value="بله" class="btn2" alt="<?=$getspecialty['id'];?>"  onclick="deletitem('specialty',this.alt)"/></td>
		</tr>
	</table>
	</div>
	<?php
			break;
		case 'doctor':
		$getdoctor = $database->getRow("SELECT * FROM `doctor` WHERE id =?", array($id));
	?>
		<div id="aaa" align="center">
		<span dir="rtl" class="text" style="font-size:16px;">آیا شما از حذف آیتم (<b class="error" style="font-size:18px;"><?=$getdoctor['name']?></b>) اطمینان دارید ؟</span>	
		<img src="../images/remove.png" style="vertical-align:middle;" />
		<table>
			<tr>
			<td><input id="closebtn" onclick="$('#removepanel').hide();" type="button" value="خیر" class="btn2" /></td>
			<td><input type="button" value="بله" class="btn2" alt="<?=$getdoctor['id'];?>"  onclick="deletitem('doctor',this.alt)"/></td>
			</tr>
		</table>
		</div>
		<?php
			break;
		case 'insurance':
			$getinsurance = $database->getRow("SELECT * FROM `insurance` WHERE id =?", array($id));
		?>
			<div id="aaa" align="center">
			<span dir="rtl" class="text" style="font-size:16px;">آیا شما از حذف آیتم (<b class="error" style="font-size:18px;"><?=$getinsurance['cname']?></b>) اطمینان دارید ؟</span>	
			<img src="../images/remove.png" style="vertical-align:middle;" />
			<table>
			<tr>
				<td><input id="closebtn" onclick="$('#removepanel').hide();" type="button" value="خیر" class="btn2" /></td>
				<td><input type="button" value="بله" class="btn2" alt="<?=$getinsurance['id'];?>"  onclick="deletitem('insurance',this.alt)"/></td>
			</tr>
			</table>
			</div>
		<?php
			break;					
		case 'feevisit':
			echo "feevisit";
			break;
		case 'editnews':
			echo "editnews";
			break;			
	}

}

//confrim Delete Item
if(isset($_GET['deleteitem'])){

	$item=$_GET["deleteitem"];
	$id=$_GET["id"];
	
	switch ($item) {
		case 'specialty':
		$getspecialty= $database->deleteRow("DELETE FROM `specialty` WHERE id =?", array($id));
		?>
		<div id="aaa" align="center">
		<table>
		<tr>
		<td><span dir="rtl" class="text" style="font-size:16px;">حذف باموفقیت انجام گرفت</span></td>
		<td><img src="../images/confrim.png"></td>
		</tr>
		<tr>
		<td align="center">
			<input type="button" class="btn2" value="بازگشت" onclick="specialty();" />
		</td>
		<td></td>
		</tr>
		</table>
		</div>
	<?php
			break;
			
		case 'doctor':
		$getdoctor= $database->deleteRow("DELETE FROM `doctor` WHERE id =?", array($id));
		?>
		<div id="aaa" align="center">
		<table>
		<tr>
		<td><span dir="rtl" class="text" style="font-size:16px;">حذف باموفقیت انجام گرفت</span></td>
		<td><img src="../images/confrim.png"></td>
		</tr>
		<tr>
		<td align="center">
			<input type="button" class="btn2" value="بازگشت" onclick="doctor();" />
		</td>
		<td></td>
		</tr>
		</table>
		</div>
	<?php
			break;
			
		case 'insurance':
		$getinsurance= $database->deleteRow("DELETE FROM `insurance` WHERE id =?", array($id));
		?>
		<div id="aaa" align="center">
		<table>
		<tr>
		<td><span dir="rtl" class="text" style="font-size:16px;">حذف باموفقیت انجام گرفت</span></td>
		<td><img src="../images/confrim.png"></td>
		</tr>
		<tr>
		<td align="center">
			<input type="button" class="btn2" value="بازگشت" onclick="insurance();" />
		</td>
		<td></td>
		</tr>
		</table>
		</div>
		<?php
			break;
							
		case 'feevisit':
			echo "feevisit";
			break;
		case 'editnews':
			echo "editnews";
			break;			
	}
}

	
if(isset($_GET['search'])){
$item=$_GET["search"];
$value=$_GET["value"];
?>
<style>
	#list{
		display: inline-block;
	}
</style>
<?php
switch ($item) {
	case 'doctorcode':
	$getrows = $database->getRows("SELECT * FROM `doctor` WHERE `code` LIKE '%$value%' ");
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
		<?php		
		break;

case 'doctorname':
	$getrows = $database->getRows("SELECT * FROM `doctor` WHERE `name` LIKE '%$value%' ");
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
		<?php		
		break;
		

}

}

if(isset($_GET['getins'])){
	$id=$_GET["getins"];
	?>
	<select dir="rtl" name="insurance_id" class="input" style="width:185px;height:30px;">
	<?php 
    $getrows = $database->getRows
    ("SELECT * FROM `insurance` WHERE `id` NOT IN(SELECT `insurance_id` FROM `spec_ins` WHERE `specialty_id`='$id')");
      foreach ($getrows as $row) {
     ?>
	  <option dir="rtl" value="<?=$row['id']?>"><?=$row['cname']?></option>
	 <?php 
	  }
	 ?>
	</select>	
	<?php
}

?>