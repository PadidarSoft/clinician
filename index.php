<?php
 if(isset($_GET['exit'])){
	user_logout();
	header('Location: index.php?page=home');
	exit();
	 
}
?>
<!DOCTYPE html>
<html>
<?php  include("header.php"); ?>
<body>
<center>
<br>
<br>


	<div class="main_login">
	<div style="margin-top: 60px;margin-right: 50px;">
		<form action='login.php' method='post'>
			<div align='right' class='l-box'>
				 <table width='360' height='75' border='0'>
		  			<tr>
		    			<td width='37' valign='middle'>&nbsp;</td>
		    			<td width='144' valign='middle'><input name='username' type='text' class='input' /></td>
		    			<td width='70' valign='middle'>نام کاربری</td>
		   			</tr>
		  			<tr>
		    		<td valign='middle'><input class="btn2"  type='submit' name='submit' id='login' value='ورود' /></td>
		    		<td valign='middle'><input name='password' type='password'  class='input'/></td>
		    		<td valign='middle'>کلمه عبور</td>
		   			</tr>
				</table>
		<div style='color:#F00;'>".$_SESSION['user_error']."</div>
			</div>
		</form>
	
	</div>
	</div>
	
</center>
</body>
</html>