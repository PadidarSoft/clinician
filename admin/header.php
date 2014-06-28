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
	$value = trim($value);    
	}
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fa">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="fa">
<title>سیستم رزرواسیون مجتمع پزشکان </title>
<link rel="stylesheet" href="../style/personal.css" type="text/css" media="screen">
<script type="text/javascript" src="../js/ajax.js"></script>
<script type="text/javascript" src="../js/magic.js"></script>
<link type="text/css" href="../style/jquery-ui-1.8.14.css" rel="stylesheet" />
 <script type="text/javascript" src="../js/jquery-1.6.2.min.js"></script>
 <script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript" src="../js/jquery.ui.datepicker-cc.all.min.js"></script>
<script type="text/javascript">
	    $(function() {
	        $('#datepicker11').datepicker({
	        	dateFormat: 'yy/mm/dd',
	            minDate: '0d',
	            maxDate: '+6d'
	        });   		      		    		  
    		       
	        $('#datepicker8').datepicker({
	            dateFormat: 'yy/mm/dd',
	            numberOfMonths: 1,
	            minDate: '0d',
	            showButtonPanel: false
	        });
	        $( "#draggable" ).draggable({ containment: "window" });
	        
	        $('#close').click(function(){
    		$('#draggable').fadeOut(); // hide the overlay
    		});
    		$('#close2').click(function(){
    		$('#removepanel').fadeOut(); // hide the overlay
    		});
    		$('#close3').click(function(){
    		$('#editpanel').fadeOut(); // hide the overlay
    		});
    		$('#close4').click(function(){
    		$('#editpanel2').fadeOut(); // hide the overlay
    		});      		      		    		  
	    });
</script>
</head>
	 