<?php
include('libs/bootstrap.php');
$userInfo = pauth();
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
			<option selected="selected"></option>
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
			<option selected="selected"></option>
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
$_SESSION['sdate']=$_GET['s'];
}

if(isset($_GET['delimg'])){
	$database->updateRow("UPDATE `pateint` SET `pic`=? WHERE id=?", array('none.png',$userInfo['id']));
?>
<div align="center" style="width:77px;height:30px;line-height:30px; position: absolute; margin-right: 0px;z-index: 1001; background-color: #999; opacity:0.5;color:#fff;">
بدون تصویر
</div>
<img src="images/pic/none.png" width="75" height="90" style="position: relative; border: 1px solid #ccc;">
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

if(isset($_GET['k'])){
	$date=$_SESSION['sdate'];
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
if(isset($_SESSION['sdate'])){
$date=$_SESSION['sdate'];
}else{
 $date=date::jdate('Y/m/j','','','','en');
$_SESSION['sdate']= $date;
}
$specialty=$_SESSION['specialty'];
$nfreetime = $database->getCountRow("SELECT * FROM `free_times` WHERE doctor_id =? and date=?", array($v,$date));
if($nfreetime>=1){
$getptimerows = $database->getRow("SELECT * FROM `specialty` WHERE id =?", array($specialty));
$getfeerow = $database->getRow("SELECT * FROM `spec_ins` WHERE specialty_id =?", array($specialty));
$getvisitrows = $database->getRow("SELECT * FROM `free_times` WHERE doctor_id =? and date=?", array($v,$date));
?>
<hr>
<div align="right">
		<table style="width: 490px; background-color: #ccc; border-radius:8px;">
		  <tr bgcolor="#ccc" height="35">
		    <th class="title">تاریخ</th>
		    <th class="title">زمان</th>
		    <th class="title">رزرو وقت</th>
		  </tr>
		  <tr height="38"  class="nav">
		    <td align="center" class="title" style="color: #777;"><?= $_SESSION['sdate'];?></td>
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
			<hr>
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