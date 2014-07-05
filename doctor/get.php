<?php
include('../libs/bootstrap.php');
$userInfo = dauth();
if(isset($_GET['q'])){
$q=$_GET["q"];
$_SESSION['specialty']=$_GET["q"];
$getrows = $database->getRows("SELECT * FROM `doctor` WHERE specialty_id =?", array($q));
?>
<table dir="rtl" style="float: right; margin-right: 57px;">
	<tr>
	    <td align="left" class="text">نوع بیمه</td>
	    <td align="right">
	    <?php  
	    $getinsurance = $database->getRow("SELECT * FROM `spec_ins` WHERE specialty_id =?", array($_SESSION['specialty']));
	    $getins = $database->getRow("SELECT * FROM `insurance` WHERE id =?", array($userInfo['insurance_id']));
		?>
		<select class="input" name="insurance" style="width: 200px;" onchange="fee(this.value)">
		<option selected="selected">انتخاب کنید...</option>
		<option value="<?=$getins['id']?>"><?=$getins['cname'] ?></option>
		<?php
		 	if ($getins['id']=='2'){
			print("</select>");
			}else{
			print("<option value='2'>آزاد</option></select>");
			}
			?>
	    </td>
	    <td><div id="fee"></div></td>
	</tr>
		
 	 	<tr>
	 	 	<td align="left"><label class="text">نام پزشک </label></td>
	 		<td align="right">
			<select class="input" name="menu" style="width: 200px;" onchange="visit_time(this.value)">
			<option selected="selected">انتخاب کنید...</option>
			<?php
			foreach ($getrows as $row) {
			?>
			<option value="<?=$row['id']?>">
			<?=$row['name']?>
			</option>
			<?php
			}
			?>
			</select>
			</td>
		</tr>
		</table>
<?php
}
		if(isset($_GET['s'])){
		$_SESSION['showdate']=$_GET['s'];
		$date=$_GET['s'];
		$nfreetime = $database->getCountRow("SELECT * FROM `visit_time` WHERE `doctor_id` =? AND `date`=?
		ORDER BY `time` ASC,`id` ASC ", array($userInfo['id'],$date));
		if($nfreetime>=1){
?>
		<table dir="rtl" style="width: 650px; background-color: #ccc; border-radius:8px;">
		<tr bgcolor="#ccc" height="35">
		<th>تاریخ</th>
		<th>ساعت<th>
		<th>نام بیمار</th>
		<th>بیمه</th>
		<th>کد رهیگری</th>
		</tr>
		<?php
		$getv = $database->getRows("SELECT * FROM `visit_time` WHERE `doctor_id` =? AND `date`=?
		ORDER BY `time` ASC,`id` ASC ", array($userInfo['id'],$date));
		foreach ($getv as $row) {
		$getd=$database->getRow("SELECT * FROM `pateint` WHERE `id` =?", array($row['pateint_id']));
		$geti=$database->getRow("SELECT * FROM `insurance` WHERE `id` =?", array($row['insurance_id']));
		?>
		<tr height="38"  class="nav" style="cursor:default" align="center" style="color: #666">
		<td bgcolor="#efefef" style="color: #777; font-size: 16px;"><?=$row['date']?></td>
		<td bgcolor="#efefef" style="color: #777; font-size: 16px;"><?=$row['time']?></td>
		<td bgcolor="#ccc"></td>
		<td><a href="#view/pateint/profile" rel="<?=$getd['id']?>" onclick="showpanel(this.rel)"><?=$getd['name']?></a></td>
		<td><?=$geti['cname']?></td>
		<td><?=$row['code']?></td>
		</tr>
		<?php } ?>
		</table>
		<?php 
		}else{
		?>
		<div align="center">
		<table style="width: 490px; background-color: #ccc; border-radius:8px;">
		<tr>
		<td>
				<div class="error" align="center">در تاریخ <?=$date?> رزرو وقت صورت نگرفته است</div>
		</td>
		</tr>
		</table>
		</div>	
		<?php
		}
}

if(isset($_GET['st'])){
	$_SESSION['start_time']=$_GET['st'];
	$st=$_GET['st'];
	?>
	<select name="startminutetime" class="input" onchange="minute(this.value)">
		<option selected="selected">دقیقه</option>
	<?php
	if($date==date::jdate('Y/m/d', '', '', '', 'en')){
		$startmt=date::jdate('i', '', '', '', 'en');
	}else{
		$startmt=0;
	}
	if($st==date::jdate('H', '', '', '', 'en')){
		$startmt=date::jdate('i', '', '', '', 'en');
	}else{
		$startmt=0;
	}
		for($i=$startmt;$i<=59;$i++){
	?>
		<option value="<?=sprintf("%02d", $i);?>"><?=sprintf("%02d", $i);?></option>
	<?php
		}
	?>
	</select>	
	<?php
}


if(isset($_GET['sub'])and $_GET['sub']!==""){
	?>
	
	<input type="button" name="Send" value="ثبت اطلاعات" class="btn2" style="width: 123px;" 
	onclick="formget(this.form, 'send.php?item=submit_time');" />
	
	<?php
}
if(isset($_GET['panel'])){
	$id=$_GET["panel"];
	$getpateint = $database->getRow("SELECT * FROM `pateint` WHERE id =?", array($id));
	?>
	<img class="image" style="margin-left:-120px;" width="85px" height="113px;" src="../images/pic/<?=$getpateint['pic'];?>" />	
	
	<div class="text" style="font-size:18px;">
	نام و نام خانوادگی : <b dir="rtl" class="error" style="font-size:19px;"><?=$getpateint['name'];?></b><br>
	کد ملی : <b class="error" style="font-size:19px;"><?=$getpateint['melicode'];?></b><br>
	سن : <b class="error" style="font-size:19px;"><?=$getpateint['age'];?> سال</b><br>
	تلفن تماس : <b class="error" style="font-size:19px;"><?=$getpateint['mobile'];?></b><br>
	</div>
	<?php 		
}

if(isset($_GET['em'])){
	$eht=$_GET['em'];
	$minute=sprintf("%02d",$_SESSION['smt']);
	if(($eht==$_SESSION['start_time']) or ($eht==$_SESSION['start_time']+1 or $minute>=60)){
			$minute=sprintf("%02d",$_SESSION['smt']);
		}else{
			$minute="00";
		}
		
		?>

		<select name="endminutetime" class="input" onchange="sub(this.value)">
			<option selected="selected">دقیقه</option>
			<?php
				for($i=$minute;$i<=59;$i++){
			?>
				<option value="<?=sprintf("%02d", $i);?>"><?=sprintf("%02d", $i);?></option>
			<?php
			}
			?>
		</select>				
		<?php
}
if(isset($_GET['mt'])){
	$getptimerows = $database->getRow("SELECT * FROM `specialty` WHERE id =?", array($userInfo['specialty_id']));
	if(isset($_SESSION['start_time'])){
		$hour=$_SESSION['start_time'];
	}else{
		$hour="00";
	}
	$minute=$_GET['mt']+$getptimerows['periood_time'];
	if($minute>=60){
		$hour=$hour+1;
		$minute=$minute-60;
		if($hour+1>24){
			$hour="23";
			$minute="59";
		}
	}
		$hour=sprintf("%02d",$hour);
		$minute=sprintf("%02d",$minute);
		$_SESSION['smt']=$minute;
	?>
	<div id="em" style="display:inline-block;">
		<select class="input" style="width: 57px;" disabled="disabled"></select>
	</div>
	:
	<select name="endthourtime" class="input" onchange="em(this.value)">
		<option selected="selected">ساعت</option>
	<?php
		for($i=$hour;$i<=23;$i++){
	?>
		<option value="<?=sprintf("%02d", $i);?>"><?=sprintf("%02d", $i);?></option>
	<?php
	}
	?>
	</select>		
	<?php
	}

if(isset($_GET['gd'])){
	$date=$_GET['gd'];
	$doctor_id=$userInfo['id'];
	$getfree = $database->getCountRow("SELECT * FROM `free_times` WHERE date =? and doctor_id=?", array($date,$doctor_id));
	if($getfree<1){
	?>
		<div id="showresult">
	<form action="#">

		<table dir="rtl">
			<tr>
				<td align="left">تاریخ:</td>
				<td align="right" class="title" style="font-size: 17px;color: #f00;">
					<input class="input" type="text" style="width:135px;" name="date" readonly="readonly" value="<?=$date?>" />
					</td>
			</tr>
			<tr>
				<td align="left">زمان شروع:</td>
				<td>
					<div id="stmt" style="display: inline-block;">
					<select name="startminutetime" class="input" disabled="disabled" onchange="minute(this.value)">
					<?php
					if($date==date::jdate('Y/m/d', '', '', '', 'en')){
						$startmt=date::jdate('i', '', '', '', 'en');
					}else{
						$startmt=0;
					}
						for($i=$startmt;$i<=59;$i++){
					?>
						<option value="<?=sprintf("%02d", $i);?>"><?=sprintf("%02d", $i);?></option>
					<?php
						}
					?>
					</select>
					</div>
					:
					<select name="starthourtime" class="input" onchange="hour(this.value)">
					<option selected="selected">ساعت</option>
					<?php
					if($date==date::jdate('Y/m/d', '', '', '', 'en')){
						$startht=date::jdate('H', '', '', '', 'en');
					}else{
						$startht=0;
					}
						for($i=$startht;$i<=23;$i++){
					?>
						<option value="<?=sprintf("%02d", $i);?>"><?=sprintf("%02d", $i);?></option>
					<?php
						}
					?>
					</select>	
					</td>
			</tr>
			
			<tr height="80">
				<td align="left">زمان پایان:</td>
				<td>
					<div id="endtime"></div>
				</td>
			</tr>
			<tr height="30">
				<td></td>
				<td>
					<div id="submit_time"><input type="button" disabled="disabled" name="Send" value="ثبت اطلاعات" class="btn3" style="width: 123px;" 
					onclick="formget(this.form, 'send.php');" /></div>
				</td>
			</tr>
		</table>
		
	</form>
	</div>
	<?php
}else{
	echo "<div align='center' class='error' style='font-size:18px;'>در تاریخ $date زمان های خالی ثبت گردیده است</div>";
}
}

if(isset($_GET['delimg'])){
	$database->updateRow("UPDATE `doctor` SET `img`=? WHERE id=?", array('none.png',$userInfo['id']));
?>
<div align="center" style="width:77px;height:30px;line-height:30px; position: absolute; margin-right: 0px;z-index: 1001; background-color: #999; opacity:0.5;color:#fff;">
بدون تصویر
</div>
<img src="../images/doctor/none.png" width="75" height="90" style="position: relative; border: 1px solid #ccc;">
<?php 
}

if(isset($_GET['f'])){
	$specialty=$_SESSION['specialty'];
	$f=$_GET['f'];
	$_SESSION['insurance_id']=$f;
	$getfee = $database->getRow("SELECT * FROM `spec_ins` WHERE specialty_id =? and insurance_id=?", array($specialty,$f));
	?>
	<div style="color: #777; font-size: 16px;">هزینه ویزیت: <b class="title" style="color: #f00;"><?=$getfee['fee']?></b>تومان</div>
	<?php

}

if(isset($_GET['news'])){
$news=$_GET['news'];
	$getnews = $database->getRow("SELECT * FROM `news` WHERE id =?", array($news));
	?>
	<a href="#" onclick="home()"> 
		<div align="center" class="button"  style="margin-left: 15px;margin-top: -2px;position: absolute;">بازگشت</div>
	</a>	
	<div style="display: inline-block;vertical-align: middle;float: right;">
	<img class="image" src="images/news/<?=$getnews['image']?>" width="100" height="100" style="border:1px solid #ccc;">
	</div>
	<div style="display: inline-block; float: right;vertical-align: right; padding: 5px;margin-top: 10px;">
	<b class="title"  style="text-align: right;font-size: 18px;"><?=$getnews['title']?></b><br>
	<b class="title" style="text-align: right; font-size: 12px;"><?=$getnews['date']?></b>
	</div>
	<br>
	<div style="width:700px; display: inline-block; float: right;text-align: right;">
	<p class="text"><?=$getnews['body']?></p>
	</div>
	<?php

}

if(isset($_GET['k'])){
	$date=$_SESSION['showdate'];
	$specialty=$_SESSION['specialty'];
	$k=$_GET['k'];
	$_SESSION['time_reserve']=$k;
	$getfree = $database->getCountRow("SELECT * FROM `visit_time` WHERE date =? and time=? and specialty_id=?", array($date,$k,$specialty));
	if($getfree<1){
	?>
	<div  class="btn2" style="width: 75px;line-height: 22px; height: 25px;" onclick="reserve_submit()">رزرو</div>
	<?php 
	}else{
	?>
	<div  class="error" style="font-size: 16px;">رزرو شده</div>
	<?php 
	}
}
if(isset($_GET['v'])){
$v=$_GET['v'];
$_SESSION['doctor_id']=$v;
if(isset($_SESSION['showdate'])){
$date=$_SESSION['showdate'];
}else{
 $date=date::jdate('Y/m/j','','','','en');
$_SESSION['showdate']= $date;
}
$getd = $database->getRow("SELECT * FROM `doctor` WHERE id =?", array($v));

$gets = $database->getRow("SELECT * FROM `specialty` WHERE id =?", array($getd['specialty_id']));
?>
<hr>
<b class="title">
:مشخصات پزشک
</b>
<div style="width: 600px; border: 1px soid #ccc; border-radius:5px;">
<table dir="rtl">
<tr>
<td><img class="image" alt="" src="images/doctor/<?=$getd['img']?>" width="75" height="95"></td>
<td>
<table>
<tr class="text">
<td align="right">نام و نام خانوادگی:<?=$getd['name']?></td>
</tr>
<tr class="text">
<td align="right">تخصص:<?=$gets['title']?></td>
</tr>
<tr class="text">
<td align="right">کد:<?=$getd['code']?></td>
</tr>
</table>
</td>
</tr>
</table>
</div>
<?php
$specialty=$_SESSION['specialty'];
$nfreetime = $database->getCountRow("SELECT * FROM `free_times` WHERE doctor_id =? and date=?", array($v,$date));
if($nfreetime>=1){
$getptimerows = $database->getRow("SELECT * FROM `specialty` WHERE id =?", array($specialty));
$getfeerow = $database->getRow("SELECT * FROM `spec_ins` WHERE specialty_id =?", array($specialty));
$getvisitrows = $database->getRow("SELECT * FROM `free_times` WHERE doctor_id =? and date=?", array($v,$date));
?>
<div align="right">
		<table style="width: 490px; background-color: #ccc; border-radius:8px;">
		  <tr bgcolor="#ccc" height="35">
		    <th class="title">تاریخ</th>
		    <th class="title">زمان</th>
		    <th class="title">رزرو وقت</th>
		  </tr>
		  <tr height="38"  class="nav">
		    <td align="center" class="title" style="color: #777;"><?= $_SESSION['showdate'];?></td>
		    <td align="center" width="90">
			<select class="input" name="insurance" style="width: 80px;font-size: 16px;height: 30px;" onchange="free(this.value)">
			<option selected="selected"></option>
			<?php 

		    for (
		    		$d = new DateTime($getvisitrows['start_time']), // Initialise DateTime object .
		    		$i = new DateInterval('PT'.$getptimerows['periood_time'].'M'); // New 45 minute date interval
		    		$d->format('H') < $getvisitrows['end_time']; // While hours (24h) less than 10
		    		$d->add($i) // Add the interval to the DateTime object
		    )
		    {
		    ?>
			
			<option value="<?=$d->format("H:i\n");?>"><?= $d->format("H:i\n"); ?></option>
		<?php 
		    }  
		  ?>
			</select>
		    </td>
		    <td align="center" style="width: 90px;"><div id="k"></div></td>
		  	</tr>


		</table>
		</div>
		  <?php
			}else{
			?>
		<div align="right">
		<table style="width: 490px; background-color: #ccc; border-radius:8px;">
		<tr>
		<td>
				<div class="error" align="center">در تاریخ <?=$date?> توسط پزشک مورد نظر زمان ویزیت مشخص نگردیده است</div>
		</td>
		</tr>
		</table>
		</div>	
			<?php
			}
		}

?>