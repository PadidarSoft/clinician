<?php
include('../libs/bootstrap.php');
$userInfo = auth();
	if(isset($_GET['item'])){
		  $item=($_GET['item']);
		  $item=filter_var($item, FILTER_SANITIZE_STRING);
	}
switch ($item) {
	case 'addspecialty':
	if(!empty($_POST['title']) && !empty($_POST['pt'])){
	$title=$_POST['title'];
	$periood_time= $_POST['pt'];
	$insertrow = $database->insertRow("INSERT INTO specialty (title,periood_time)
		 		 VALUES (?,?)" , array($title,$periood_time));		 
		print("
			<div id='aaa' align='center'>
				<table>
					<tr>
					<td align='center'><img src='../images/edit-confrim.png'></td>
					</tr>
					<tr>
						<td><span dir='rtl' class='text' style='font-size:18px;'>ثبت با موفقیت انجام گرفت</span></td>
					</tr>
					<tr>
						<td align='center'>
							<input type='button' class='btn2' value='بازگشت' onclick='specialty();' />
						</td>
						<td></td>
					</tr>
				</table>
				</div>
		");
	}else{
		print("<div align='center' style='color:red;font-size:16px;'>خطا: لطفا تمامی فیلد ها را پر نمایید<br>
				<div align='center' class='btn2' onclick='specialty()'
	 	 		style='width:120px;height:30px;line-height:30px;position:absolute;margin-left:-60px;margin-top:5px;'>
	 			بازگشت <img  src='../images/icon/add.png' style='vertical-align:middle; margin-right:-5px;' />
	 			</div>");
	}
	break;
	
	case 'editspecialty':
	if(!empty($_POST['title']) && !empty($_POST['pt'])){
	$id=$_POST['id'];	
	$title=$_POST['title'];
	$periood_time= $_POST['pt'];
		$updatspecialty= $database->updateRow("UPDATE `specialty` SET `title`=?,`periood_time`=? WHERE `id`=?",
		array($title,$periood_time,$id));
		print("
			<div id='aaa' align='center'>
				<table>
				<tr>
				<td align='center'><img src='../images/edit-confrim.png'></td>
				</tr>
				<tr>
					<td><span dir='rtl' class='text' style='font-size:18px;'>ویرایش با موفقیت انجام گرفت</span></td>
				</tr>
				<tr>
				<td align='center'>
					<input type='button' class='btn2' value='بازگشت' onclick='specialty();' />
				</td>
				<td></td>
				</tr>
				</table>
				</div>
		");
	}else{
		print("<div align='center' style='color:red;font-size:16px;'>خطا: لطفا تمامی فیلد ها را پر نمایید<br>
				<div align='center' class='btn2' onclick='specialty()'
	 	 		style='width:120px;height:30px;line-height:30px;position:absolute;margin-left:-60px;margin-top:5px;'>
	 			بازگشت <img  src='../images/icon/add.png' style='vertical-align:middle; margin-right:-5px;' />
	 			</div>");
	}
	
	break;
	
		case 'adddoctor':
				if(
				!empty($_POST['name']) && !empty($_POST['username']) && !empty($_POST['password'])
				&& !empty($_POST['code'])&& !empty($_POST['melicode'])&& !empty($_POST['mobile'])
				&& !empty($_POST['education'])
				){
				$name=$_POST['name'];
				$chkusername=$_POST['username'];
				$countrow = $database->getCountRow("SELECT * FROM doctor WHERE username =?", array($chkusername));
				if($countrow<1){
					$username=$_POST['username'];
				}else{
					die ("<SCRIPT LANGUAGE='JavaScript'>window.alert('نام کاربری انتخاب شده وجود دارد')
							window.history.back();
							</SCRIPT>");
				}
				$password=__md5($_POST['password']);
				$melicode=$_POST['melicode'];
				$gender=$_POST['gender'];
				$code=$_POST['code'];
				$mobile=$_POST['mobile'];
				$education=$_POST['education'];
				$specialty_id=$_POST['specialty_id'];
				if(!empty($_POST['email'])){
					if(filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL)){
						$email=$_POST['email'];
					}else{
						die ("<SCRIPT LANGUAGE='JavaScript'>
	    						window.alert('فرمت ارسالی ایمیل صحیح نمی باشد')
								window.history.back();
								</SCRIPT>");
					}
				
				}else{
					$email="";
				}
				$address=strip_tags($_POST['address']);
				$sname='none.png';
					$insertrow = $database ->insertRow("INSERT INTO doctor
					(name,username,password,specialty_id,code,melicode,gender,education,img,email,mobile,address) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)"
					, array($name,$username,$password,$specialty_id,$code,$melicode,$gender,$education,$sname,$email,$mobile,$address));
			print("
			<div id='aaa' align='center'>
				<table>
				<tr>
				<td align='center'><img src='../images/edit-confrim.png'></td>
				</tr>
				<tr>
					<td><span dir='rtl' class='text' style='font-size:18px;'>ثبت با موفقیت انجام گرفت</span></td>
				</tr>
				<tr>
				<td align='center'>
					<input type='button' class='btn2' value='بازگشت' onclick='doctor();' />
				</td>
				<td></td>
				</tr>
				</table>
			</div>
		");
	
	}else{
		
		print("<div align='center' style='color:red;font-size:16px;'>خطا: لطفا تمامی فیلد ها را پر نمایید<br>
				<div align='center' class='btn2' onclick='doctor()'
	 	 		style='width:120px;height:30px;line-height:30px;position:absolute;margin-left:-60px;margin-top:5px;'>
	 			بازگشت <img  src='../images/icon/add.png' style='vertical-align:middle; margin-right:-5px;' />
	 			</div>");
	}
		
		break;
		
	case 'editdoctor':
	if(
	!empty($_POST['name']) && !empty($_POST['code'])&& !empty($_POST['mobile'])
	){
	$id=$_POST['id'];	
	$name=$_POST['name'];
	$gender=$_POST['gender'];
	$code=$_POST['code'];
	$mobile=$_POST['mobile'];
	$specialty_id=$_POST['specialty_id'];
		$updatspecialty= $database->updateRow("UPDATE `doctor` SET `name`=?,`code`=?,`gender`=?
		,`mobile`=?,`specialty_id`=? WHERE `id`=?",
		array($name,$code,$gender,$mobile,$specialty_id,$id));
		print("
			<div id='aaa' align='center'>
				<table>
				<tr>
				<td align='center'><img src='../images/edit-confrim.png'></td>
				</tr>
				<tr>
					<td><span dir='rtl' class='text' style='font-size:18px;'>ویرایش با موفقیت انجام گرفت</span></td>
				</tr>
				<tr>
				<td align='center'>
					<input type='button' class='btn2' value='بازگشت' onclick='doctor();' />
				</td>
				<td></td>
				</tr>
				</table>
				</div>
		");
	}else{
		print("<div align='center' style='color:red;font-size:16px;'>خطا: لطفا تمامی فیلد ها را پر نمایید<br>
				<div align='center' class='btn2' onclick='doctor()'
	 	 		style='width:120px;height:30px;line-height:30px;position:absolute;margin-left:-60px;margin-top:5px;'>
	 			بازگشت <img  src='../images/icon/add.png' style='vertical-align:middle; margin-right:-5px;' />
	 			</div>");
	}
	break;

	case 'addinsurance':
	if(!empty($_POST['cname'])){
	$cname=$_POST['cname'];
	$type=$_POST['type'];
	$des=strip_tags($_POST['des']);
	$insertrow = $database->insertRow("INSERT INTO insurance (cname,type,des)VALUES (?,?,?)" , array($cname,$type,$des));		 
	print("
		<div id='aaa' align='center' style='margin-left:60px;'>
		<table>
			<tr>
			<td align='center'><img src='../images/edit-confrim.png'></td>
			</tr>
			<tr>
			<td><span dir='rtl' class='text' style='font-size:18px;'>ثبت با موفقیت انجام گرفت</span></td>
			</tr>
			<tr>
			<td align='center'>
				<input type='button' class='btn2' value='بازگشت' onclick='insurance();' />
			</td>
			<td></td>
			</tr>
		</table>
		</div>
	");
	}else{
	print("
		<div align='center' style='color:red;font-size:16px;'>خطا: لطفا تمامی فیلد ها را پر نمایید<br>
			<div align='center' class='btn2' onclick='insurance()'
		 	style='width:120px;height:30px;line-height:30px;position:absolute;margin-left:-60px;margin-top:5px;'>
		 	بازگشت <img  src='../images/icon/add.png' style='vertical-align:middle; margin-right:-5px;' />
		 	</div>
	 	</div>
 	");
	}
	break;		
	
	case 'editinsurance':
	if(!empty($_POST['cname'])){
	$id=$_POST['id'];
	$cname=$_POST['cname'];
	$type=$_POST['type'];
	$des=strip_tags($_POST['des']);
		$updatspecialty= $database->updateRow("UPDATE `insurance` SET `cname`=?,`type`=?,`des`=? WHERE `id`=?",
		array($cname,$type,$des,$id));
		print("
			<div id='aaa' align='center' style='margin-left:58px;margin-top:-100px;'>
				<table>
				<tr>
				<td align='center'><img src='../images/edit-confrim.png'></td>
				</tr>
				<tr>
					<td><span dir='rtl' class='text' style='font-size:18px;'>ویرایش با موفقیت انجام گرفت</span></td>
				</tr>
				<tr>
				<td align='center'>
					<input type='button' class='btn2' value='بازگشت' onclick='insurance();' />
				</td>
				<td></td>
				</tr>
				</table>
				</div>
		");
	}else{
		print("<div align='center' style='color:red;font-size:16px;'>خطا: لطفا تمامی فیلد ها را پر نمایید<br>
				<div align='center' class='btn2' onclick='insurance()'
	 	 		style='width:120px;height:30px;line-height:30px;position:absolute;margin-left:-60px;margin-top:5px;'>
	 			بازگشت <img  src='../images/icon/add.png' style='vertical-align:middle; margin-right:-5px;' />
	 			</div>");
	}
	
	break;

	case 'addfeevisit':
	if(!empty($_POST['fee']) && isset($_POST['insurance_id']) && !empty($_POST['insurance_id']) ){
	$fee=$_POST['fee'];
	$specialty_id= $_POST['specialty_id'];
	$insurance_id= $_POST['insurance_id'];
	$insertrow = $database->insertRow("INSERT INTO spec_ins (fee,insurance_id,specialty_id)
		 		 VALUES (?,?,?)" , array($fee,$insurance_id,$specialty_id));		 
		print("
			<div id='aaa' align='center' style='margin-left:65px;margin-top:-100px;'>
				<table>
					<tr>
					<td align='center'><img src='../images/edit-confrim.png'></td>
					</tr>
					<tr>
						<td><span dir='rtl' class='text' style='font-size:18px;'>ثبت با موفقیت انجام گرفت</span></td>
					</tr>
					<tr>
						<td align='center'>
							<input type='button' class='btn2' value='بازگشت' onclick='feevisit();' />
						</td>
						<td></td>
					</tr>
				</table>
				</div>
		");
	}else{
		print("<div align='center' style='color:red;font-size:16px;'>خطا: لطفا تمامی فیلد ها را پر نمایید<br>
				<div align='center' class='btn2' onclick='feevisit()'
	 	 		style='width:120px;height:30px;line-height:30px;position:absolute;margin-left:-60px;margin-top:5px;'>
	 			بازگشت <img  src='../images/icon/add.png' style='vertical-align:middle; margin-right:-5px;' />
	 			</div>");
	}
	break;
	
	case 'editfeevisit':
	if(!empty($_POST['fee']) && isset($_POST['insurance_id']) ){
	$fee=$_POST['fee'];
	$specialty_id= $_POST['specialty_id'];
	$insurance_id= $_POST['insurance_id'];
		$updatspecialty= $database->updateRow("UPDATE `spec_ins` SET `fee`=?,`specialty_id`=?,`insurance_id`=? WHERE `id`=?",
		array($fee,$specialty_id,$insurance_id,$id));
		print("
			<div id='aaa' align='center'>
				<table>
				<tr>
				<td align='center'><img src='../images/edit-confrim.png'></td>
				</tr>
				<tr>
					<td><span dir='rtl' class='text' style='font-size:18px;'>ویرایش با موفقیت انجام گرفت</span></td>
				</tr>
				<tr>
				<td align='center'>
					<input type='button' class='btn2' value='بازگشت' onclick='feevisit();' />
				</td>
				<td></td>
				</tr>
				</table>
				</div>
		");
	}else{
		print("<div align='center' style='color:red;font-size:16px;'>خطا: لطفا تمامی فیلد ها را پر نمایید<br>
				<div align='center' class='btn2' onclick='feevisit()'
	 	 		style='width:120px;height:30px;line-height:30px;position:absolute;margin-left:-60px;margin-top:5px;'>
	 			بازگشت <img  src='../images/icon/add.png' style='vertical-align:middle; margin-right:-5px;' />
	 			</div>");
	}
	
	break;		
			
	}
?>