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
            $("#newEvent").click(function(e){
                if( e.target != this )
                    return;
                $("#newEventCont").slideToggle();
            });
            $(".edit").click(function(){
                $("#newEvent .text").text("Edit Event");
                var child=$(this).parent().parent();
                $("#editId").val(child.children(":nth-child(1)").attr("type"));
                $("#type").val(child.children(":nth-child(2)").attr("type"));
                $("#name").val(child.children(":nth-child(3)").text());
                $("#description").val(child.children(":nth-child(4)").text());
                $("#date").val(child.children(":nth-child(5)").text());
                $("#newEventCont").slideDown();
            });
            $("#cancel").click(function(e){
                $("#newEvent .text").text("New Event");
                $("#newEventCont").slideUp();
            });
            $(".eventSubmit").click(function(){
                $(this).fadeOut(1000);
                clearTimeout(hide);
            });
            var hide=setTimeout(function(){
                $(".eventSubmit").fadeOut(1000);
                clearTimeout(hide);
            },10000);
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
        $editId=$_POST['editId'];
        if($editId==""){
            $sql="INSERT INTO events
                  VALUES(NULL,'$userId','$eventType','$name','$description','$date')";
            $db->query($sql) or die($db->error);
            echo '<div class="eventSubmit">New event successfully added.</div>';
        }
        else{
            $sql="UPDATE events
            SET type='$eventType',name='$name',description='$description',date='$date'
            WHERE id='$editId'";
            $db->query($sql) or die($db->error);
            echo '<div class="eventSubmit">Event successfully updated.</div>';
        }
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
        <td type=\"".$row['id']."\">".$i."</td>
        <td type=\"".$row['type']."\">".$v_eventType[$row['type']]."</td>
        <td>".$row['name']."</td>
        <td>".$row['description']."</td>
        <td>".$row['date']."</td>
        <td><span class='edit'>Edit</span> <a href='event_manage.php?eventId=".$row['id']."'>Manage</a> <a href='#'>Delete</a></td>
        </tr>";
        $i++;
    }
    ?>
</table>
<br>
<div id="newEvent"><span class="text">New Event</span>
<div id="newEventCont">
    <form method="post" action="manage.php">
        <input type="hidden" id="editId" name="editId" value="" />
        <table>
            <tr>
                <td><label for="type">Event Type:</label></td>
                <td><select id="type" name="type" required>
                        <option value="">Select an Event Type..</option>
                        <option value="1">BirthDay</option>
                        <option value="2">Marriage</option>
                        <option value="3">Break Up</option>
                        <option value="4">Anniversary</option>
                    </select></td>
            </tr>
            <tr>
                <td><label for="name">Name:</label></td>
                <td><input type="text" name="name" id="name" required/></td>
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
        <input type="submit" value="Done"/><button id="cancel" type="reset">Cancel</button>
    </form>
</div>
</div>
</div>
</body>
</html>