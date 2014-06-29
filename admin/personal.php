<?php
include('../libs/bootstrap.php');
$managerInfo = auth();
?>

<!DOCTYPE html>
<html>
<?php
 include("header.php");
?>
 			  	<div style="width:30px; height:400px; margin-left:350px;margin-top:70px; position:absolute;">
		  		<div id="draggable">
		  			<div class="close" id="close"><img src="../images/close.png" /></div><br>
		  			<div align="right" id="bodypanel" style="cursor:move;"></div>
		  		</div>
		  		
		  		<div id="removepanel">
		  			<div class="close" id="close2"><img src="../images/close.png" /></div><br>
		  			<div align="right" id="bodyremove" style="cursor:move;"></div>
		  		</div>
		  		
		  		<div id="editpanel">
		  			<div class="close" id="close3"><img src="../images/close.png" /></div><br>
		  			<div align="right" id="bodyedit" style="cursor:move;"></div>
		  		</div>	  		
		 		</div>
 <body>
 <div align="center" style="width: 1024px; margin-left: auto; margin-right: auto;">
		<div id="a">
		 <input class="input"  readonly="readonly"  title="برای انتخاب تاریخ کلیک کنید" type="text"
		 id="datepicker11"  style="width:90px; cursor: pointer; color: #f00; font-size: 16px;"	 value="انتخاب تاریخ" onchange="showdate(this.value)">
		 <label class="title"> : تاریخ های رزرو</label> 
		</div>
		<div id="b">
		 <input class="input"  readonly="readonly"  title="برای انتخاب تاریخ کلیک کنید" type="text"
		 id="datepicker8"  style="width:90px; cursor: pointer; color: #f00; font-size: 16px;" value="انتخاب تاریخ" onchange="gdate(this.value)">
		 <label class="title"> : تاریخ های رزرو</label> 
		</div>
 		<div class="doctor_main">
		 <div class="right_panel">
		 	<img alt="" src="../images/cartable3.png"><br>
		 	<b class="title">امروز:<?php echo date::jdate('j F Y'); ?>  </b>
		 	<hr>
		 	<table>
		 	<tr>
		 	<td><b class="title"><?=$managerInfo['name']?></b></td>
		 	</tr>
		 	</table>
		 	<br>
		 	<div class="menu"  onclick="specialty()">تعریف تخصص</div>		 	
		 	<div class="menu"  onclick="doctor()">تعریف پزشک</div>
		 	<div class="menu" onclick="insurance()">تعریف بیمه</div>
		 	<div class="menu" onclick="feevisit()">تعریف نرخ ویزیت</div>
		 	<div class="menu" onclick="addnews()">ثبت خبر</div>	
		 	<div class="menu" onclick="profile()">ویرایش اطلاعات</div>	 			 	
		 	<a href="index.php?exit=true"><div class="menu" >خروج</div></a>
		 </div>
		  <div id="main_panel"  class="main_panel">
		  <img src="../images/home.png" />	
		<?php
		if (isset($_POST['edit'])) {
		if (!empty($_POST['name'])){
			$name = $_POST['name'];
			if (empty($_POST['password']) && empty($_POST['oldpassword'])) {
				$password = $managerInfo['password'];
			} else {
				$oldpass=$managerInfo['password'];
				if (__md5($_POST['oldpassword'])!==$oldpass){
					die ("<SCRIPT LANGUAGE='JavaScript'>
	    					window.alert('کلمه عبور قبلی شما صحیح نمی باشد')
							window.history.back();
							</SCRIPT>");
				}
				$password=__md5($_POST['password']);
				}

			if (!empty($_POST['email'])) {
				if (filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
					$email = $_POST['email'];
				} else {
					die ("<SCRIPT LANGUAGE='JavaScript'>
	    						window.alert('فرمت ارسالی ایمیل صحیح نمی باشد')
								window.history.back();
								</SCRIPT>");
				}
			} else {
				$email = "";
			}

				$updateuser = $database->updateRow("UPDATE  `manager`
				 SET `name`=?,`password`=?,`email`=? WHERE `id`=?"
				 , array($name,	$password, $email,$managerInfo['id']));
				  print("<div align='center' class='box-message'>
				  بروزرسانی با موفقیت انجام گرفت</div> ");
		} else {
			echo ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('لطفا فیلد های ستاره دار را پر نمایید')
					window.history.back();
					</SCRIPT>");
		}
	}
		  
		  ?>
		  </div>
	 </div>
 </div>
 </body>
</html>