<?php
include('libs/bootstrap.php');
$userInfo = pauth();
?>
<!DOCTYPE html>
<html>
<?php 
 include("header.php");
 switch ($page) {
 	case 'reserve':
 	?>
 	<style>
		#a{
				display: inline-block;
				margin-left: -170px;
				margin-top: 10px;
				}
	</style>
 	<b  class="title" style="font-size: 28px; color: #f00;">رزرو پزشک</b><br><hr>
 	<form action="">
 	<table dir="rtl" style="width: 650px; float: right;">
 	<tr>
 		<td align="left"><label class="text">تخصص </label></td>
 		<td align="right">
 		<select name="specialty" class="input"  style="width: 200px;" onchange="showdoctor(this.value)">
 		<option selected="selected"></option>
 		 <?php 
            $getrows = $database->getRows("SELECT * FROM specialty");
            foreach ($getrows as $row) {
          ?>
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
 	break;
 	
 	case 'profile':
 			echo "profile";
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
		}
		$chkvisittime2 = $database->getCountRow("SELECT pateint_id FROM `visit_time` WHERE time =? and date=?", array($time,$date));
		if($chkvisittime2>=1){
			die("<div align='center' style='color:red;font-size:16px;'>رزرو وقت در این تاریخ و زمان به علت ثبت وقت در همین بازه در تخصصی دیگر امکان پذیر نمی باشد</div> ");
		}
 		$insertrow = $database ->insertRow("INSERT INTO visit_time
							(specialty_id,doctor_id,pateint_id,insurance_id,date,time) VALUES (?,?,?,?,?,?)"
 							, array($specialty,$doctor,$pateint,$insurance,$date,$time));
 		print("<div align='center' style='color:green;font-size:16px;'>ثبت وقت با موفقیت انجام گردید</div> ");
 		break;
 }
 ?>