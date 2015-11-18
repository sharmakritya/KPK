<?php
session_start();
require_once('config.php');
$db_config=new DB_config();
$db=$db_config->connect();
$eventId=$_GET['eventId'];
?>
<html>
<head>
<link href="css/event_manage.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<div id="left">
<br>
<a href="invites.php?eventId=<?php echo $eventId; ?>">Invites</a>
<br>
<a href="feedback.php?eventId=<?php echo $eventId; ?>">Feedback</a>
<br>
<a href="edit.php?eventId=<?php echo $eventId; ?>">Edit</a>
</div>
<div id="right">
<img src="images/logo.jpg" style="width:100%;height:100%"/>
</div>
</body>
</html>