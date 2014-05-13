<?php
	if(!isset($_GET['page'])){
		header("location:personal.php?page=home");
 		exit();
		}else{
								  array_filter($_GET, 'trim_value'); 
								  $page=($_GET['page']);
								  $page=filter_var($page, FILTER_SANITIZE_STRING);
			}

	
 	function trim_value(&$value)
	{
	$value = trim($value);    // this removes whitespace and related characters from the beginning and end of the string
	}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="fa">
<title>سیستم رزرواسیون مجتمع پزشکان </title>
<link href="style/lightbox.css" rel="stylesheet" />
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen">
<script src="jquery/jquery.min.js"></script>
<script src="jquery/jquery-1.7.2.min.js"></script>
<script src="jquery/lightbox.js"></script>
<script type="text/javascript" src="jquery/custom.js"></script>

<script>
function numericFilter(txb) {
   txb.value = txb.value.replace(/[^\0-9]/ig, "");
}

function loadXMLDoc()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("main").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","admin.php?page=addnews",true);
xmlhttp.send();
}
function CheckEmpty(){
  
	    if(document.getElementById('user').value === ''){
        document.getElementById('u').innerHTML = 'لطفا نام کاربری را وارد نمایید';
        return false;
        }else{
        document.getElementById('u').innerHTML = '';
    }
    
    	    if(document.getElementById('pass').value === ''){
        document.getElementById('u').innerHTML = 'لطفا کلمه عبور را وارد نمایید';
        return false;
        }else{
        document.getElementById('u').innerHTML = '';
    }
    
    	    if(document.getElementById('username').value === ''){
        document.getElementById('un').innerHTML = 'لطفا نام کاربری را وارد نمایید';
        return false;
        }else{
        document.getElementById('un').innerHTML = '';
    }
      	    if(document.getElementById('password').value === ''){
        document.getElementById('pw').innerHTML = 'لطفا کلمه عبور را وارد نمایید';
        return false;
        }else{
        document.getElementById('pw').innerHTML = '';
    }
    	    if(document.getElementById('cpass').value === ''){
        document.getElementById('cp').innerHTML = 'لطفا کلمه عبور مجددا را وارد نمایید';
        return false;
        }else{
        document.getElementById('cp').innerHTML = '';
    }
        if(document.getElementById('name').value === ''){
        document.getElementById('n').innerHTML = 'لطفا نام و نام خانوادگی را وارد نمایید';
        return false;
        }else{
        document.getElementById('n').innerHTML = '';
    }
        if(document.getElementById('email').value === ''){
        document.getElementById('e').innerHTML = 'لطفا ایمیل خود را وارد نمایید';
        return false;
        }else{
        document.getElementById('e').innerHTML = '';
    }
     if(document.getElementById('tel').value === ''){
        document.getElementById('t').innerHTML = 'لطفا شماره تماس خود را وارد نمایید';
        return false;
        }else{
        document.getElementById('t').innerHTML = '';
    }
    if(document.getElementById('pcode').value === ''){
        document.getElementById('m').innerHTML = 'لطفا کد پستی خود را وارد نمایید';
        return false;
        }else{
        document.getElementById('m').innerHTML = '';
    }
        if(document.getElementById('fuser').value === ''){
        document.getElementById('fu').innerHTML = 'لطفا نام کاربری خود را وارد نمایید';
        return false;
        }else{
        document.getElementById('fu').innerHTML = '';
    }
            if(document.getElementById('femail').value === ''){
        document.getElementById('fe').innerHTML = 'لطفا ایمیل خود را وارد نمایید';
        return false;
        }else{
        document.getElementById('fe').innerHTML = '';
    }
}
function imposeMaxLength(Object, MaxLen)
{
  return (Object.value.length <= MaxLen);
}
    
</script>
</head>
	 