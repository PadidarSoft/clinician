var specialKeys = new Array();
specialKeys.push(8); //Backspace
function IsNumeric(e) {
var keyCode = e.which ? e.which : e.keyCode
var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
document.getElementById("error").style.display = ret ? "none" : "inline";
return ret;
}

function reserve()
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
    document.getElementById("main_panel").innerHTML=xmlhttp.responseText;
    }
  }
$('#draggable').hide(); 
$('#addpnel').hide(); 
$('#editpanel').hide(); 
$('#removpanel').hide(); 
xmlhttp.open("GET","ajax.php?page=reserve",true);
xmlhttp.send();
}



function dvisit_time()
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
    document.getElementById("main_panel").innerHTML=xmlhttp.responseText;
    }
  }
$('#draggable').hide(); 
$('#addpnel').hide(); 
$('#editpanel').hide(); 
$('#removpanel').hide();
xmlhttp.open("GET","ajax.php?page=visit_time",true);
xmlhttp.send();
}


function home()
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
    document.getElementById("main_panel").innerHTML=xmlhttp.responseText;
    }
  }
$('#draggable').hide(); 
$('#addpnel').hide(); 
$('#editpanel').hide(); 
$('#removpanel').hide();
xmlhttp.open("GET","ajax.php?page=home",true);
xmlhttp.send();
}

function history()
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
    document.getElementById("main_panel").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajax.php?page=history",true);
xmlhttp.send();
}

function profile()
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
    document.getElementById("main_panel").innerHTML=xmlhttp.responseText;
    }
  }
$('#draggable').hide(); 
$('#addpnel').hide(); 
$('#editpanel').hide(); 
$('#removpanel').hide();
xmlhttp.open("GET","ajax.php?page=profile",true);
xmlhttp.send();
}

function reserve_submit()
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
    document.getElementById("main_panel").innerHTML=xmlhttp.responseText;
    }
  }
$('#draggable').hide(); 
$('#addpnel').hide(); 
$('#editpanel').hide(); 
$('#removpanel').hide();
xmlhttp.open("GET","ajax.php?page=reserve_submit",true);
xmlhttp.send();
}

function showdoctor(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
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
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","get.php?q="+str,true);
xmlhttp.send();
}

function ins_type(str)
{
if (str=="")
  {
  document.getElementById("ins_type").innerHTML="";
  return;
  } 
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
    document.getElementById("ins_type").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","get.php?getins="+str,true);
xmlhttp.send();
}



function news(str)
{
if (str=="")
  {
  document.getElementById("main_panel").innerHTML="";
  return;
  } 
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
    document.getElementById("main_panel").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","get.php?news="+str,true);
xmlhttp.send();
}

function hour(str)
{
if (str=="")
  {
  document.getElementById("stmt").innerHTML="";
  return;
  } 
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
    document.getElementById("stmt").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","get.php?st="+str,true);
xmlhttp.send();
}

function sub(str)
{
if (str=="")
  {
  document.getElementById("submit_time").innerHTML="";
  return;
  } 
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
    document.getElementById("submit_time").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","get.php?sub="+str,true);
xmlhttp.send();
}


function em(str)
{
if (str=="")
  {
  document.getElementById("em").innerHTML="";
  return;
  } 
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
    document.getElementById("em").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","get.php?em="+str,true);
xmlhttp.send();
}


function minute(str)
{
if (str=="")
  {
  document.getElementById("endtime").innerHTML="";
  return;
  } 
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
    document.getElementById("endtime").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","get.php?mt="+str,true);
xmlhttp.send();
}

function delimg(str)
{
if (str=="")
  {
  document.getElementById("img").innerHTML="";
  return;
  } 
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
    document.getElementById("img").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","get.php?delimg="+str,true);
xmlhttp.send();
}

function fee(str)
{
if (str=="")
  {
  document.getElementById("fee").innerHTML="";
  return;
  } 
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
    document.getElementById("fee").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","get.php?f="+str,true);
xmlhttp.send();
}

function sdate(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
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
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
$('#draggable').hide(); 
$('#addpnel').hide(); 
$('#editpanel').hide(); 
$('#removpanel').hide();
xmlhttp.open("GET","get.php?s="+str,true);
xmlhttp.send();
}

function showdate(str)
{
if (str=="")
  {
  document.getElementById("visit_time").innerHTML="";
  return;
  } 
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
    document.getElementById("visit_time").innerHTML=xmlhttp.responseText;
    }
  }
$('#draggable').hide(); 
$('#addpnel').hide(); 
$('#editpanel').hide(); 
$('#removpanel').hide();
xmlhttp.open("GET","get.php?s="+str,true);
xmlhttp.send();
}


function gdate(str)
{
if (str=="")
  {
  document.getElementById("gdate").innerHTML="";
  return;
  } 
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
    document.getElementById("gdate").innerHTML=xmlhttp.responseText;
    }
  }
$('#draggable').hide(); 
$('#addpnel').hide(); 
$('#editpanel').hide(); 
$('#removpanel').hide();
xmlhttp.open("GET","get.php?gd="+str,true);
xmlhttp.send();
}


function visit_time(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
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
    document.getElementById("visit_time").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","get.php?v="+str,true);
xmlhttp.send();
}

function free(str)
{
if (str=="")
  {
  document.getElementById("k").innerHTML="";
  return;
  } 
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
    document.getElementById("k").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","get.php?k="+str,true);
xmlhttp.send();
}

function showpanel(str)
{
if (str=="")
  {
  $('#draggable').fadeIn("fast");
  $('#close').show();  
$('#removepanel').hide();
$('#editpanel').hide();
  document.getElementById("bodypanel").innerHTML="";
  return;
  } 
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
  $('#draggable').fadeIn("fast");
  $('#close').show();
  $('#removepanel').hide();
  $('#editpanel').hide();  
    document.getElementById("bodypanel").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","get.php?panel="+str,true);
xmlhttp.send();
}

///// admin

function doctor()
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
    document.getElementById("main_panel").innerHTML=xmlhttp.responseText;
    }
  }
$('#draggable').hide(); 
$('#addpnel').hide(); 
$('#editpanel').hide(); 
$('#removepanel').hide();  
xmlhttp.open("GET","ajax.php?page=doctor",true);
xmlhttp.send();
}

function insurance()
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
    document.getElementById("main_panel").innerHTML=xmlhttp.responseText;
    }
  }
$('#draggable').hide(); 
$('#addpnel').hide(); 
$('#editpanel').hide(); 
$('#removepanel').hide();  
xmlhttp.open("GET","ajax.php?page=insurance",true);
xmlhttp.send();
}

function specialty()
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
    document.getElementById("main_panel").innerHTML=xmlhttp.responseText;
    }
  }
$('#draggable').hide(); 
$('#addpnel').hide(); 
$('#editpanel').hide(); 
$('#removepanel').hide();  
xmlhttp.open("GET","ajax.php?page=specialty",true);
xmlhttp.send();
}

function feevisit()
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
    document.getElementById("main_panel").innerHTML=xmlhttp.responseText;
    }
  }
$('#draggable').hide(); 
$('#addpnel').hide(); 
$('#editpanel').hide(); 
$('#removepanel').hide();  
xmlhttp.open("GET","ajax.php?page=feevisit",true);
xmlhttp.send();
}

function addnews()
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
    document.getElementById("main_panel").innerHTML=xmlhttp.responseText;
    }
  }
$('#draggable').hide(); 
$('#addpnel').hide(); 
$('#editpanel').hide(); 
$('#removepanel').hide();  
xmlhttp.open("GET","ajax.php?page=addnews",true);
xmlhttp.send();
}

function addpanel(str)
{
if (str=="")
  {
  $('#draggable').fadeIn("fast");
  $('#close').show();  
$('#removepanel').hide();
$('#editpanel').hide();
  document.getElementById("bodypanel").innerHTML="";
  return;
  } 
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
  $('#draggable').fadeIn("fast");
  $('#close').show();
  $('#removepanel').hide();
  $('#editpanel').hide();  
    document.getElementById("bodypanel").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","get.php?addpanel="+str,true);
xmlhttp.send();
}


function removepanel(str,id)
{
if (str=="")
  {
  $('#removepanel').show();  
  $('#close2').show();
  $('#draggable').hide();
  $('#editpanel').hide();  
  document.getElementById("bodyremove").innerHTML="";
  return;
  } 
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
  $('#removepanel').show();  
  $('#close2').show();
  $('#draggable').hide();
  $('#editpanel').hide();  
    document.getElementById("bodyremove").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","get.php?deletepanel="+str+"&id="+id,true);
xmlhttp.send();
}

function deletitem(str,id)
{
if (str=="")
  {
  $('#removepanel').show();  
  $('#close2').show();
  $('#draggable').hide();
  $('#editpanel').hide();  
  document.getElementById("bodyremove").innerHTML="";
  return;
  } 
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
  $('#removepanel').show();  
  $('#close2').show();
  $('#draggable').hide();
  $('#editpanel').hide();
    document.getElementById("bodyremove").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","get.php?deleteitem="+str+"&id="+id,true);
xmlhttp.send();
}


function editpanel(str,id)
{
if (str=="")
  {
  $('#editpanel').show();  
  $('#close3').show();
  $('#draggable').hide();
  $('#editpanel').hide();
  $('#removepanel').hide();    
  document.getElementById("bodyedit").innerHTML="";
  return;
  } 
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
  $('#editpanel').show();  
  $('#close3').show();  
    document.getElementById("bodyedit").innerHTML=xmlhttp.responseText;
    }
  }
  $('#editpanel').show();  
  $('#close3').show();
  $('#draggable').hide();
  $('#editpanel').hide(); 
xmlhttp.open("GET","get.php?editpanel="+str+"&id="+id,true);
xmlhttp.send();
}

function search(str,value)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
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
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
$('#draggable').hide();
$('#removepanel').hide();
$('#editpanel').hide(); 
xmlhttp.open("GET","get.php?search="+str+"&value="+value,true);
xmlhttp.send();
}