<?php
session_start();
require_once('config.php');
$db_config=new DB_config();
$db=$db_config->connect();
$eventId=$_GET['eventId'];
?>
<html>
<head>
<link href="css/invites.css" type="text/css" rel="stylesheet"/>
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
<br />
<form method="post" action="add_invite.php">
        <table>
        	<tr>
            <td><label for="name">Name:</label></td>
            <td><input type="text" name="name" id="name" required/></td>
            </tr>
             <tr>
            <td><label for="email">Email ID:</label></td>
            <td><input type="email" name="email" id="email" required/></td>
            </tr>
             <tr>
            <td><label for="msg">Message:</label></td>
            <td><textarea name="msg" id="msg" required></textarea></td>
            </tr>
            <input type="hidden" name="eventId" value="<?php echo $eventId; ?>" />   
        </table>
        	<input type="submit" value="Invite"/>
        </form>
        <br />
        <h1>Guest List</h1>
            <table  class="main-table">
            <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Response</th>
            </tr>
            <?php
			$sql="SELECT * FROM invites WHERE eventId='$eventId'";
            $result=$db->query($sql);
            $v_Response=array('Not Attending','Attending','Not Sure');
            $v_Response['']="";
            $i=1;
            while($row=$result->fetch_assoc()){
                echo "<tr>
                <td type=\"".$row['id']."\">".$i."</td>
                <td>".$row['name']."</td>
                <td>".$row['emailId']."</td>
                <td>".$v_Response[$row['response']]."</td>
                </tr>";
                $i++;
            }
            ?>
        </table>
</div>
</body>
</html>