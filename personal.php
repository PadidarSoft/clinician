<?php
include('libs/bootstrap.php');
$userInfo = pauth();
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
		 id="datepicker11"  style="width:90px; cursor: pointer; color: #f00; font-size: 16px;"	 value="انتخاب تاریخ"/ onchange="sdate(this.value)">
		 <label class="title"> : تاریخ های رزرو</label> 
		</div>
 		<div class="main">
		 <div class="right_panel">
		 	<img alt="" src="images/cartable.png"><br>
		 	<b class="title">امروز:<?php echo date::jdate('j F Y'); ?>  </b>
		 	<hr>
		 	<table>
		 	<tr>
		 	<td><b class="title"><?=$userInfo['name']?></b></td>
		 	<td><img class="image" src="images/pic/<?=$userInfo['pic']?>" width="85px" height="113px;"></td>
		 	</tr>
		 	</table>
		 	<br>
		 	<div class="menu" onclick="reserve()">رزرو پزشک</div>
		 	<div class="menu" onclick="profile()">ویرایش اطلاعات</div>
		 	<a href="index.php?exit=true"><div class="menu">خروج</div></a>
		 </div>
		  <div id="main_panel"  class="main_panel"></div>
	 </div>
 </div>
 </body>
</html>