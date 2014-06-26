<?php
include('../libs/bootstrap.php');
$userInfo = dauth();
	if(isset($_GET['item'])){
		  $item=($_GET['item']);
		  $item=filter_var($item, FILTER_SANITIZE_STRING);
	}
switch ($item) {
	case 'submit_time':
	$date=$_POST['date'];
	$starthourtime= $_POST['starthourtime'];
	$startminutetime=$_POST['startminutetime'];
	$startime=$starthourtime.":".$startminutetime;
	$endhourtime= $_POST['endthourtime'];
	$endminutetime=$_POST['endminutetime'];
	$endtime=$endhourtime.":".$endminutetime;
	$doctor_id=$userInfo['id'];
	$insertrow = $database->insertRow("INSERT INTO free_times (doctor_id,date,start_time,end_time)
		 		 VALUES (?,?,?,?)" , array($doctor_id,$date,$startime,$endtime));
	if(isset($insertrow)){			 
		print("<div align='center' style='color:green;font-size:16px;'>ثبت زمان با موفقیت انجام گردید");
	}else{
		print("<div align='center' style='color:red;font-size:16px;'>خطا: مشکلی در ثبت اطلاعات وجود دارد<br>
				<div align='center' class='btn2' onclick='reserve()'
	 	 		style='width:120px;height:30px;line-height:30px;position:absolute;margin-left:-60px;margin-top:5px;'>
	 			بازگشت <img  src='images/icon/add.png' style='vertical-align:middle; margin-right:-5px;' />
	 			</div>");
	}
	break;
}
?>