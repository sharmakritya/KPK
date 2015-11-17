<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Event Name</title>
<link href="css/eventPage.css" type="text/css" rel="stylesheet"/>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".cont-box").hide();
			$("#cont-1").show();
			$("#link-1").click(function(){
				$('html, body').animate({scrollTop:$(window).height()*9/10},1000);
				$(".cont-box").hide();
				$("#cont-1").show();
			});
			$("#link-2").click(function(){
				$('html, body').animate({scrollTop:$(window).height()*9/10},1000);
				$(".cont-box").hide();
				$("#cont-2").show();
			});
		})
	</script>
<style type="text/css">
	body{
		padding: 0;
		margin: 0;
	}
	.bgdiv{
		background:url(images/Home_3.jpg);
		background-size:100% 100%;
		top:0;
		left:0;
		position:absolute;
		width:100%;
		height:100%;
	}
	#eventName{
		position: absolute;
		top: 40%;
		text-align: center;
		width: 100%;
		font-size: 6em;
		background-color: rgba(255,255,255,0.5);
	}
	#menu{
		position: absolute;
		bottom: 0;
		left: 0;
		width: 100%;
		height: 10%;
		background-color: #212121;
	}
	#menu ul li{
		padding: 10px;
		cursor: pointer;
		display: inline;
		margin: 30px;
		font-size: 1.7em;
		text-transform: uppercase;
		color: #dadada;
	}
	#cont{
		position: absolute;
		top: 100%;
		left: 0;
		width: 100%;
		height: 90%;
	}
	.cont-box{
		width: 100%;
		height: 100%;
		background-color: #1E90FF;
		padding: 5%;
		box-sizing: border-box;
	}
	.box{
		width: 100%;
		height: 100%;
		background-color: black;
		border-radius: 20px;
		text-align: center;
		color: white;
		box-sizing: border-box;
		overflow: auto;
	}
</style>
</head>
<body>
<div class="bgdiv">
	<div id="eventName">Event Name</div>
	<div id="menu">
		<ul>
			<li id="link-1">Story</li>
			<li id="link-2">Itinerary</li>
			<li id="link-3">Gift</li>
			<li id="link-4">Feedback</li>
			<li id="link-5">Gallery</li>
		</ul>
	</div>
</div>
<div id="cont">
	<div id="cont-1" class="cont-box">
		<div class="box">
			<h1>Story</h1>
			<p>oooo</p>
		</div>
	</div>
	<div id="cont-2" class="cont-box">
		<div class="box">
			<h1>Itinerary</h1>
			<p>Venue: Aditi</p>
			<ul>
				<li>5:00 pm - Start</li>
				<li>6:00 pm - End</li>
			</ul>
		</div>
	</div>
</div>
</body>
</html>
