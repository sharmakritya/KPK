<?php
session_start();
require_once('config.php');
$db_config=new DB_config();
$db=$db_config->connect();
$eventId=$_GET['eventId'];
?>
<html>
<head>
<link href="css/feedback.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<div id="left">
<img id="bar_logo" src="images/logo.jpg"/>
<br>

<a href="invites.php">Invites</a>
<br>
<a href="feedback.php">Feedback</a>
<br>
<a href="edit.php">Edit</a>
</div>
<div id="right">
	<h1>Feedback</h1>
            <table  class="main-table">
            <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Rating</th>
            <th>Feedback</th>
            <th>Actions</th>
            </tr>
            <?php
			$sql="SELECT * FROM feedback WHERE eventId='$eventId'";
    $result=$db->query($sql);
    $i=1;
    while($row=$result->fetch_assoc()){
        echo "<tr>
        <td type=\"".$row['id']."\">".$i."</td>
        <td>".$row['name']."</td>
        <td>".$row['emailId']."</td>
		        <td>".$row['rating']."</td>
        <td>".$row['feedback']."</td>
 <td><a href='#'>Reply</a> <a href='#'>Delete</a></td>
        </tr>";
        $i++;
    }
    ?>
        </table>
</div>
</body>
</html>