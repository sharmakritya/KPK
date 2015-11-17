<?php
session_start();
require_once('config.php');
$db_config=new DB_config();
$db=$db_config->connect();
$eventId=$_GET['eventId'];
?>
<html>
<head>
<link href="css/edit.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<div id="left">
<img id="bar_logo" src="images/logo.jpg"/>
<br>
    <a href="invites.php?eventId=<?php echo $eventId; ?>">Invites</a>
    <br>
    <a href="feedback.php?eventId=<?php echo $eventId; ?>">Feedback</a>
    <br>
    <a href="edit.php?eventId=<?php echo $eventId; ?>">Edit</a>
</div>
<div id="right">
    <?php
    $sql="SELECT * FROM events WHERE id='$eventId'";
    $result=$db->query($sql);
    $row=$result->fetch_assoc();
    echo "<h1>".$row['name']."</h1>";
    ?>
Choose a Module to edit:<br><br>
    <?php
    $sql="SELECT * FROM modules WHERE eventId='$eventId'";
    $result=$db->query($sql);
    while($row=$result->fetch_assoc()){
        echo "<a href='edit.php?eventId=".$eventId."&moduleId=".$row['id']."'>".$row['title']."</a><br>";
    }
    if(isset($_GET['moduleId'])){
        $moduleId=$_GET['moduleId'];
        echo $moduleId;
        $sql="SELECT * FROM modules WHERE id='$moduleId'";
        $result=$db->query($sql);
        $row=$result->fetch_assoc();
        echo "<br>
            <form method='post' action='edit_edit.php'>
            <input type='hidden' name='moduleId' value='".$moduleId."' />
            <input type='text' name='moduleTitle' required value='".$row['title']."' /><br>";
        $moduleTypeId=$row['moduleTypeId'];
        if($moduleTypeId==1){
            echo "<textarea name='storyEdit' required></textarea><br>";
        }
        echo "<input type='submit' value='Save Changes' />
              </form>";
    }
    ?>
</div>
</body>
</html>