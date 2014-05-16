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
if(isset($_GET['f'])){
	$specialty=$_SESSION['specialty'];
	$f=$_GET['f'];
	$getfee = $database->getRow("SELECT * FROM `spec_ins` WHERE specialty_id =? and insurance_id=?", array($specialty,$f));
	?>
	<div style="color: #777; font-size: 16px;">هزینه ویزیت: <b class="title" style="color: #f00;"><?=$getfee['fee']?></b>تومان</div>
	<?php

}
if(isset($_GET['v'])){
$v=$_GET['v'];
$date=$_SESSION['sdate'];
$specialty=$_SESSION['specialty'];
?>
<hr>

		<table style="width: 490px; background-color: #ccc; border-radius:8px;">
		  <tr bgcolor="#ccc" height="35">
		    <th class="title">تاریخ</th>
		    <th class="title">زمان</th>
		    <th class="title">رزرو وقت</th>
		  </tr>
<?php
		$getptimerows = $database->getRow("SELECT * FROM `specialty` WHERE id =?", array($specialty));
		$getfeerow = $database->getRow("SELECT * FROM `spec_ins` WHERE specialty_id =?", array($specialty));
		$getvisitrows = $database->getRow("SELECT * FROM `free_times` WHERE doctor_id =? and date=?", array($v,$date));
		for (
		$d = new DateTime($getvisitrows['start_time']), // Initialise DateTime object .
		$i = new DateInterval('PT'.$getptimerows['periood_time'].'M'); // New 45 minute date interval
		$d->format('H') < $getvisitrows['end_time']; // While hours (24h) less than 10
		$d->add($i) // Add the interval to the DateTime object
		)
		{
?>
		  <tr height="35"  class="nav">
		    <td align="center" class="title" style="color: #777;"><?= $_SESSION['sdate'];?></td>
		    <td align="center" class="title" style="color: #777;"><?= $d->format("H:i\n"); ?></td>
		    <td align="center" style="width: 90px;"><div class="btn2" align="center" style="height:23px; line-height: 20px;">رزرو</div></td>
		  </tr>

		  	<?php 
		  }
		  ?>
		</table>
		  <?php
}
?>