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
 }
 ?>