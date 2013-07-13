<?php session_start(); ?>
<?php include("../include/koneksi.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Web Penjualan Spare Part</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/menu.css" rel="stylesheet" type="text/css" />
<link href="redactor/redactor.css" rel="stylesheet" type="text/css" />
<script src="../js/menu.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui.min.js" ></script>
<script language="javascript" src="../js/jquery.ticker.js"></script> 
<script type="text/javascript" src="redactor/jquery-1.7.min.js" ></script>
<script type="text/javascript" src="redactor/redactor.min.js" ></script>
<script type="text/javascript">
$(document).ready(
	function()
	{
		$('#redactor_txt').redactor();
	}
);
	$("#slideshow > div:gt(0)").hide();

	setInterval(function() { 
	  $('#slideshow > div:first')
	    .fadeOut(1000)
	    .next()
	    .fadeIn(1000)
	    .end()
	    .appendTo('#slideshow');
	},  3000);
</script>
</head>

<body onLoad="goforit()">
<div id="other-nav">
	<div id="inner-other-nav">
		<div id="clock-nav">Welcome guest. <script src="../js/clock.js" type="text/javascript"></script><span id="clock"></span></div>
		<div id="search-nav">
		<form class="quick_search">
	<input type="text" placeholder="Search Something....">
	<input type="submit" value="SEARCH" />
	</form>
	</div>
</div>
</div><!--akhir other-nav -->

<div class="cleaner_h60"></div>
<div class="cleaner_h60"></div>
<div class="cleaner_h60"></div>
<div class="cleaner_h5"></div>