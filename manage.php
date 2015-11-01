<?php
session_start();
require_once('config.php');
$db_config=new DB_config();
$db=$db_config->connect();
?>
<html>
<head>
<link href="css/manage.css" type="text/css" rel="stylesheet" />
    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#newEvent").click(function(){
                $("#newEventCont").slideToggle();
            })
        })
    </script>
</head>
<body>
<?php

if(!isset($_SESSION['loggedIn'])){
    die("You are not logged in. Please log in.");
}
$userId=$_SESSION['userId'];
$sql="SELECT * FROM users WHERE id='$userId'";
$result=$db->query($sql);
$row=$result->fetch_assoc();
?>
<div id="main">
<h2 align="center">Welcome <?php echo $row['firstName']." ".$row['lastName']; ?></h2>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $eventType=$_POST['type'];
        $name=$_POST['name'];
        $description=$_POST['description'];
        $date=$_POST['date'];
        $sql="INSERT INTO events
              VALUES('','$userId','$eventType','$name','$description','$date')";
        $db->query($sql);
        echo '<div class="eventSubmit">New event successfully added.</div>';
    }
    $sql="SELECT * FROM events WHERE userId='$userId'";
    $result=$db->query($sql);
    $v_eventType=array('','BirthDay','Marriage','Break Up','Anniversary');

    ?>
<table class="main-table" align="center" width="80%">
<tr>
	<th>#</th>
    <th>Type</th>
    <th>Name</th>
    <th style="width:50%">Description</th>
    <th>Date</th>
    <th>Actions</th>
</tr>
    <?php
    $i=1;
    while($row=$result->fetch_assoc()){
        echo "<tr>
        <td>".$i."</td>
        <td>".$v_eventType[$row['type']]."</td>
        <td>".$row['name']."</td>
        <td>".$row['description']."</td>
        <td>".$row['date']."</td>
        <td><a href='newedit.php'>Edit</a> <a href='#'>Manage</a> <a href='#'>Delete</a></td>
        </tr>";
        $i++;
    }
    ?>
</table>
<br>
<div id="newEvent">New Event
<div id="newEventCont">
    <form method="post" action="manage.php">
        <table>
            <tr>
                <td><label for="Type">Event Type:</label></td>
                <td><select id="Type" name="type" required>
                        <option value="">Select an Event Type..</option>
                        <option value="1">BirthDay</option>
                        <option value="2">Marriage</option>
                        <option value="3">Break Up</option>
                        <option value="4">Anniversary</option>
                    </select></td>
            </tr>
            <tr>
                <td><label for="Name">Name:</label></td>
                <td><input type="text" name="name" id="Name" required/></td>
            </tr>
            <tr>
                <td><label for="description">Description:</label></td>
                <td><textarea name="description" id="description" required></textarea></td>
            </tr>
            <tr>
                <td><label for="date">Date:</label></td>
                <td><input type="date" name="date" id="date" required/></td>
            </tr>
        </table>
        <br>
        <input type="submit" value="Done"/>
    </form>
</div>
</div>
</div>
</body>
</html>